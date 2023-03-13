<?php

namespace Modules\Admission\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AppliedStudent;
use Illuminate\Http\Request;

class AppliedStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function studentView(Request $request)
    {
        $roll = $request->get('roll');
        $student = AppliedStudent::query()->where('ssc_roll',$roll)->first();

        if(!$student){
            return response('<h3 class="text-danger text-center">Student not found in <b>Applied Student</b> database!</h3>');
            //abort(404,'Student not found in applied database!');
        }

        $subjects = json_decode($student->subjects);

        return view('admission::admission._student-view',compact('student','subjects'));
    }

    public function sms($data)
    {
        $api_key = smsConfig('api_key');
        $contacts = $data['mobile'];
        $senderid = smsConfig('sender_id');
        //$sms = $request->get('message');
        $sms = $data['name'].' your form has been successfully submitted to '.siteConfig('title').'. Your student ID is '.$data['studentId'];

        $URL = "http://bangladeshsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".urlencode($contacts)."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=UTF-8']);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_URL, $URL);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

//        try{
//            $output = $content=curl_exec($ch);
//            print_r($output);
//        }catch(Exception $ex){
//            $output = "-100";
//        }
    }


}
