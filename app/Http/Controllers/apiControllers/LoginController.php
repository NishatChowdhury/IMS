<?php

namespace App\Http\Controllers\apiControllers;

use App\apiModel\Otp;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function studentLogin(Request $request)
    {
        $this->validator($request);

        if(Auth::guard('student')->attempt($request->only('studentId','password')))
        {
            //Authentication passed...
            return response()
                ->json(['status' => true,'message' => 'Login was Successful'],200);
        }
        else
        {
            return response()
                ->json(['status' => false,'message' => 'Invalid Username or Password !'],500);
        }
    }

    private function validator(Request $request)
    {
        //validation rules.
        $rules = [
            'studentId'    => 'required|exists:student_logins|min:2|max:191',
            'password' => 'required|string|min:4|max:255',
        ];

        //custom validation error messages.
        $messages = [
            'studentId.exists' => 'These credentials do not match our records.',
        ];

        //validate the request.
        $request->validate($rules,$messages);
    }

    private function loginFailed(): \Illuminate\Http\RedirectResponse
    {
        return redirect()
            ->back()
            ->withInput()
            ->with('error','Login failed, please try again!');
    }

    public function otp(Request $request)
    {
        if(Auth::guard('student'))
        {
            $mobile = $request->get('mobile');
//            $studentId = $request->get('studentId');
            $otp = rand(1000,9999);
            $student = Student::query()
//                ->where('studentId',$studentId)
                ->where('mobile',$mobile)
                ->first();
            if($student)
            {
                $data = [
                    'student_id' => $student->id,
                    'otp' => $otp
                ];
                Otp::query()->create($data);
                $mobile = $student->mobile;
                $smsData = [];
                $smsData['mobile'] = $mobile;
                $smsData['textbody'] = "Your Web Point Verification Code is: ".$otp."\nKindly keep this code hidden!";

                $url = "https://sms.solutionsclan.com/api/sms/send";
                $data = [
                    "apiKey"=> 'A0001234bd0dd58-97e5-4f67-afb1-1f0e5e83d835',
                    "contactNumbers"=> $smsData['mobile'],
                    "senderId"=> '8809612440636',
                    "textBody"=> $smsData['textbody']
                ];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                $response = curl_exec($ch);
//            echo "$response";
                curl_close($ch);
                return response()
                    ->json(['status' => true,'message' => 'OTP was sent successfully!'],200);
            }
            else
            {
                return response()
                    ->json(['status' => false,'message' => 'OTP was not sent!'],500);
            }
        }

    }

    public function token(Student $student,Request $request)
    {
        $students = $student->all();
        foreach ($students as $student)
        {
            $token = $student->createToken($student->name);
            return['token'=>$token->plainTextToken];
        }
    }

    public function matchOtp(Request $request)
    {
        if(Auth::guard('student')) {
            $otpRequest = $request->get('otp');
            $otp = Otp::query()->where('otp',$otpRequest)->first();
            if($otp){
                $studentId = $otp->student_id;
                $studentInfo = Student::query()
                                ->where('id',$studentId)
                                ->select('name','mobile','image','email')
                                ->first();
                $student = Student::query()
                        ->where('id',$studentId)
                        ->get();

                foreach ($student as $t){
                    $token = $t->createToken($t->name);
                }

                $sliders = Slider::query()->select('image','description')->get();
                return response()
                    ->json(
                        [
                            'status'        => true,
                            'message'       => 'Request was successful!',
                            'auth_token'    =>$token->plainTextToken,
                            'user'          => $studentInfo,
                            'sliders'       =>$sliders
                        ],200);
            }
            else{
                return response()
                        ->json(['status' => false,'message' => 'OTP is not matched!'],500);
            }

        }
    }

//    public function matchOtp(Request $request)
//    {
//        if(Auth::guard('student')) {
//            $otpRequest = $request->get('otp');
//             $otp = Otp::all();
//            foreach ($otp as $t){
//                if ($t->otp == $otpRequest){
//                    $student_id = $t->student_id;
//
//                    $student = Student::query()
//                        ->where('id',$student_id)
//                        ->first();
//
//                    $studentInfo = Student::query()
//                        ->where('id',$student_id)
//                        ->select('name','mobile','image','email')
//                        ->first();
//
//                    $token = $student->createToken($student->name);
//
//                    $sliders = Slider::query()->select('image','description')->get();
//                    return response()
//                        ->json(
//                            [
//                                'status'        => true,
//                                'message'       => 'Request was successful!',
//                                'auth_token'    =>$token->plainTextToken,
//                                'user'          => $studentInfo,
//                                'sliders'       =>$sliders
//                            ],200);
//                }
//                else{
//                    return response()
//                        ->json(['status' => false,'message' => 'Invalid OTP, Please Try Again!'],500);
//                }
//            }
//        }
//    }
}
