<?php

namespace App\Http\Controllers;

use App\Models\Backend\Attendance;
use App\Models\Backend\ClassSchedule;
use App\Models\Backend\Notice;
use App\Models\Backend\NoticeCategory;
use App\Models\Backend\Page;
use App\Models\Backend\SiteInformation;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Backend\Syllabus;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class AndroidController extends Controller
{
    public function login(Request $request)
    {
        $mobile = $request->get('mobile');
        $studentId = $request->get('studentId');
        $otp = rand(1000,9999);
        $student = Student::query()
            ->where('studentId',$studentId)
            ->where('mobile',$mobile)
            ->exists();


        if($student){
            $message = "<#> আপনার ওয়েব পয়েন্ট ভেরিফিকেশন কোড ".$otp."\nদয়া করে কোডটি গোপন রাখুন dFPFWKrPd0B";
        }else{
             $message = "<#> আপনার ওয়েব পয়েন্ট ভেরিফিকেশন কোড ".$otp."\nদয়া করে কোডটি গোপন রাখুন dFPFWKrPd0B";
        }

        $this->sms($mobile,$message);

        return ['otp_pin'=>$otp];
    }

    public function systemInfo()
    {
        return SiteInformation::query()->findOrFail(1);
    }

    public function attendance(Request $request)
    {
        $student = $request->get('studentId');
        $start = Carbon::parse($request->get('start'))->startOfDay();
        $end = Carbon::parse($request->get('end'))->endOfDay();

        $attendances = Attendance::query()
            ->whereBetween('access_date',[$start,$end])
            ->where('registration_id',$student)
            ->get()
            ->groupBy('date');

        dd($attendances);

        foreach($attendances as $date => $attendance){
            $entry = $attendances->min('access_date');
            $exit = $attendances->max('access_date');
        }

        dd($attendances->min('access_date'));
    }

    public function about()
    {
        return Page::query()->where('name','introduction')->get('content');
    }

    public function president()
    {
        return Page::query()->where('name','president message')->get('content');
    }

    public function profile(Request $request)
    {
        $studentId = $request->get('studentId');
        return Student::query()->where('studentId',$studentId)->latest()->first();
    }

    public function teachers()
    {
        $teachers = Staff::query()->where('staff_type_id',2)->get();

        $data = [];

        foreach($teachers as $teacher){
            $data[] = [
                'name' => $teacher->name,
                'father_husband' => $teacher->father_husband,
                'mobile' => $teacher->mobile,
                'dob' => $teacher->dob,
                'nid' => $teacher->nid,
                'gender' => $teacher->gender->name,
                'blood' => $teacher->blood->name,
                'image' => asset('assets/img/staffs').'/'.$teacher->image,
                'mail' => $teacher->mail,
                'code' => $teacher->code,
                'title' => $teacher->title,
                //['ole'] => $teacher->role->name,
                //['ob_type'] => $teacher->jobType->name,
                //['taff_type'] => $teacher->staffType->name,
                'joining' => $teacher->joining,
                'salary' => $teacher->salary,
                'bonus' => $teacher->bonus,
            ];
        }

        return $data;
    }

    public function syllabus(Request $request)
    {
        $student = Student::query()->where('studentId',$request->studentId)->latest()->first();
        $syllabus = Syllabus::query()->where('academic_class_id',$student->academic_class_id)->first();
        return ['file'=>asset('assets/syllabus').'/'.$syllabus->file];
    }

    public function notices()
    {
        $categories = NoticeCategory::all()->pluck('name','id');
        $notices = Notice::query()->where('notice_type_id',2)->get();
        return ['categories'=>$categories,'notices'=>$notices];
    }

    public function classRoutine()
    {
        $routines = ClassSchedule::all();

        $data = [];

        foreach($routines as $routine){
            $data[] = [
                'class_name' => 1,
                'name' => $routine->name,
                'subject' => $routine->subject->name,
                'teacher' => $routine->teacher->name ?? '',
                'day' => $routine->day->short_name,
                'start' => $routine->start,
                'end' => $routine->end,
            ];
        }

        return $data;
    }

//    public function sms($number,$message)
//    {
//        $api_key = 'A0001234bd0dd58-97e5-4f67-afb1-1f0e5e83d835';
//        $senderid = 'BULKSMS';
//        $URL = "https://sms.solutionsclan.com/api/sms/send?api_key=".$api_key."&type=text&contacts=".$number."&senderid=".$senderid."&msg=".urlencode($message);
//
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL,$URL);
//        curl_setopt($ch, CURLOPT_HEADER, 0);
//        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
//        curl_setopt($ch, CURLOPT_POST, 0);
//        try{
//            $output = $content = curl_exec($ch);
//            //print_r($output);
//        }catch(Exception $ex){
//            $output = "-100";
//        }
//        //return $output;
//    }
     public function sms($number,$message)
    {
        $url = "https://sms.solutionsclan.com/api/sms/send";
        $data = [
                "apiKey"=> 'A0001234bd0dd58-97e5-4f67-afb1-1f0e5e83d835',
                "contactNumbers"=> $number,
                "senderId"=> 'BULKSMS',
                "textBody"=> $message
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        echo "$response";
        curl_close($ch);

    }



}
