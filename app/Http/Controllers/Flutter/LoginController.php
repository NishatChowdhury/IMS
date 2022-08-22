<?php

namespace App\Http\Controllers\Flutter;

use App\apiModel\Otp;
use App\Http\Controllers\Controller;
use App\Models\Backend\Slider;
use App\Models\Backend\Student;
use App\Models\Student\StudentLogin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    public function studentLogin(Request $request)
    {
        $loginInfo = StudentLogin::query()->where('studentId',$request->studentId)->exists();
        if (!$loginInfo){
            return response()
                ->json(['status' => false,'message' => 'Invalid Username or Password !'],422);
        }

        if(is_null($request->password)){
            return response()
                ->json(['status' => false,'message' => 'Invalid Username or Password !'],422);
        }

        $validated = $request->validate([
            'studentId' => 'required|exists:student_logins|min:2|max:191',
            'password' => 'required|string|min:4|max:255',
        ]);

        if(Auth::guard('student')->attempt($request->only('studentId','password'))){
            $student = Student::query()->where('studentId',$request->studentId)->latest()->first();
            $this->otp($student->mobile);
            return response()
                ->json(['status' => true,'message' => 'Login was Successful'],200);
        }else{
            return response()
                ->json(['status' => false,'message' => 'Invalid Username or Password !'],422);
        }
    }


    public function otp($mobile)
    {
        $otp = rand(1000,9999);
        $student = Student::query()
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

    public function token(Student $student,Request $request)
    {
        $students = $student->all();
        foreach ($students as $student)
        {
            $token = $student->createToken($student->name);
            return['token'=>$token->plainTextToken];
        }
    }

    /**
     * Match OTP with database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function matchOtp(Request $request): JsonResponse
    {
        $otpRequest = $request->get('otp');

        $otp = Otp::query()
            //->where('otp',$otpRequest)
            ->latest()
            ->first();

        //dd($otp);

        if($otp->otp == $otpRequest){
            $studentId = $otp->student_id;
            $studentInfo = Student::query()
                ->where('id',$studentId)
                ->select('name','mobile','image','email')
                ->first();
            $student = Student::query()
                ->where('id',$studentId)
                ->first();
            $token = $student->createToken($student->name);
            $sliders = Slider::query()->get();
            if ($sliders->isNotEmpty()){
                $data = [];
                foreach ($sliders as $slider){
                    $data[] = [
                        'id'=> $slider->id,
                        'image' => $slider->image ? asset('assets/img/sliders/' . $slider->image) : null,
                    ];
                }
            }
            return response()
                ->json(
                    [
                        'auth_token'    =>  $token->plainTextToken,
                        'user'          =>  $studentInfo,
                        'sliders'       =>  $data
                    ],200);
        }
        else{
            return response()
                ->json(['status' => false,'message' => 'OTP is not matched!'],422);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()
                    ->json(['status'=>true,'message' => 'Logged out successfully'],200);
    }

}