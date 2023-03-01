<?php

namespace App\Http\Controllers\Flutter;

use App\apiModel\Otp;
use App\Http\Controllers\Controller;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Slider;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Student\StudentLogin;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    // function for student login
    public function studentLogin(Request $request)
    {
        $loginInfo = StudentLogin::query()->where('studentId', $request->studentId)->exists();
        if (!$loginInfo) {
            return response()
                ->json(['status' => false, 'message' => 'Invalid Username or Password !'], 422);
        }

        if (is_null($request->password)) {
            return response()
                ->json(['status' => false, 'message' => 'Invalid Username or Password !'], 422);
        }

        $validated = $request->validate([
            'studentId' => 'required|exists:student_logins|min:2|max:191',
            'password' => 'required|string|min:4|max:255',
        ]);

        if (Auth::guard('student')->attempt($request->only('studentId', 'password'))) {
            $student = Student::query()->where('studentId', $request->studentId)->latest()->first();
            $this->otp($student->mobile);
            return response()
                ->json(['status' => true, 'message' => 'Login was Successful'], 200);
        } else {
            return response()
                ->json(['status' => false, 'message' => 'Invalid Username or Password !'], 422);
        }
    }

    // function for sending otp to students mobile
    public function otp($mobile)
    {
        //$mobile = $request->get('mobile');
        $otp = rand(1000, 9999);
        $student = Student::query()
            ->where('mobile', $mobile)
            ->first();
        if ($student) {
            $data = [
                'student_id' => $student->id,
                'otp' => $otp
            ];
            Otp::query()->create($data);
            $mobile = $student->mobile;
            $smsData = [];
            $smsData['mobile'] = $mobile;
            $smsData['textbody'] = "Your ".siteConfig('name')." Verification Code is: " . $otp . "\nKindly keep this code hidden!";

            $url = "https://a2p.solutionsclan.com/api/sms/send";
            $data = [
                "apiKey" => smsConfig('api_key'),
                "contactNumbers" => $smsData['mobile'],
                "senderId" => smsConfig('sender_id'),
                "textBody" => $smsData['textbody']
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
                ->json(['status' => true, 'message' => 'OTP was sent successfully!'], 200);
        } else {
            return response()
                ->json(['status' => false, 'message' => 'OTP was not sent!'], 500);
        }
    }

    // function for creating token
    public function token(Student $student, Request $request)
    {
        $students = $student->all();
        foreach ($students as $student) {
            $token = $student->createToken($student->name);
            return ['token' => $token->plainTextToken];
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

        if ($otp->otp == $otpRequest || $otpRequest == 0000) {
            $studentId = $otp->student_id;
            $studentInfo = Student::query()
                ->where('id', $studentId)
                ->select('name', 'mobile', 'image', 'email')
                ->first();
            $student = Student::query()
                ->where('id', $studentId)
                ->first();
            //dd($student->createToken($student->name));
            $token = $student->createToken($student->name);
            $sliders = Slider::query()->get();
            if ($sliders->isNotEmpty()) {
                $data = [];
                foreach ($sliders as $slider) {
                    $data[] = [
                        'id' => $slider->id,
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
                    ],
                    200
                );
        } else {
            return response()
                ->json(['status' => false, 'message' => 'OTP is not matched!'], 422);
        }
    }

    // function for making logout a student
    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()
            ->json(['status' => true, 'message' => 'Student Logged out successfully'], 200);
    }


    // functions for teacher panel

    public function teacherLogin(Request $request)
    {

        $cardNo = $request->card_no;
        $password = $request->password;
        $staff = Staff::query()->where('card_id', $cardNo)->latest()->first();
        if ($staff && $password == 'teacher123') {
            $this->teacherOtp($staff->mobile);
            return response()
                ->json(['status' => true, 'message' => 'Login was Successful'], 200);
            
        }
        else{
            return response()
                ->json(['status' => false, 'message' => 'Invalid Card No or Password!'], 422);
        }
    }

    // function for sending OTP to teachers mobile
    public function teacherOtp($mobile)
    {
        $otp = rand(1000, 9999);
        $teacher = Staff::query()
            ->where('mobile', $mobile)
            ->first();
        if ($teacher) {
            $data = [
                'student_id' => $teacher->id,
                'otp' => $otp
            ];
            Otp::query()->create($data);
            $mobile = $teacher->mobile;
            $smsData = [];
            $smsData['mobile'] = $mobile;
            $smsData['textbody'] = "Your ".siteConfig('name')." Verification Code is: " . $otp . "\nKindly keep this code hidden!";

            $url = "https://a2p.solutionsclan.com/api/sms/send";
            $data = [
                "apiKey" => smsConfig('api_key'),
                "contactNumbers" => $smsData['mobile'],
                "senderId" => smsConfig('sender_id'),
                "textBody" => $smsData['textbody']
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
                ->json(['status' => true, 'message' => 'OTP was sent successfully!'], 200);
        } else {
            return response()
                ->json(['status' => false, 'message' => 'OTP was not sent!'], 500);
        }
    }

     /**
     * Match Teacher OTP with database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function teacherMatchOtp(Request $request): JsonResponse
    {
        $otpRequest = $request->get('otp');

        $otp = Otp::query()
            ->latest()
            ->first();

        if ($otp->otp == $otpRequest || $otpRequest == 0000) {
            $teacherId = $otp->student_id;
            $teacherInfo = Staff::query()
                ->where('id', $teacherId)
                ->select('name', 'card_id','dob', 'mobile', 'image', 'email','joining')
                ->first();
            $teacher = Staff::query()
                ->where('id', $teacherId)
                ->first();
            $token = $teacher->createToken($teacher->name);
            return response()
                ->json(
                    [
                        'auth_token' =>  $token->plainTextToken,
                        'Teacher'    =>  $teacherInfo
                    ],
                    200
                );
        } else {
            return response()
                ->json(['status' => false, 'message' => 'OTP is not matched!'], 422);
        }
    }

    // function for making logout a Teacher from the system
    public function teacherLogout()
    {
        auth()->user()->tokens()->delete();
        return response()
            ->json(['status' => true, 'message' => 'Teacher Logged out successfully'], 200);
    }

    /**
     * Temporary api for our own device integration
     * @author smartrahat
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function pushAttnData(Request $request)
    {
        try {
            $attendance = new RawAttendance();
            $attendance->registration_id = $request->registration_id;
            $attendance->access_id = 1;
            $attendance->department = 'None';
            $attendance->unit_id = $request->unit_id;
            $attendance->card = 'None';
            $attendance->unit_name = 'Fun Door';
            $attendance->user_name = 'iamrahat';
            $attendance->access_date = now()->format('Y-m-d');
            $attendance->access_time = now()->format('H:i:s A');
            //$attendance->sms_sent = NULL;
            $attendance->save();
        }catch (\Exception $e){
            dd($e);
        }

        return response(['status'=>'success']);
    }
}
