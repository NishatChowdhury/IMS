<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\ClassSchedule;
use App\Http\Resources\NewsCollection;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NoticeResource;
use App\Http\Resources\NoticeCollection;
use App\Models\Backend\Notice;
use App\Models\Backend\InstituteMessage;
use App\Models\Backend\Page;
use App\SiteInformation;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Syllabus;
use App\Models\Backend\UpcomingEvent;
use App\Models\Backend\NoticeCategory;
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

        //dd($attendances);

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

    public function principalMessage()
    {
        $principalMessage = InstituteMessage::query()->where('alias','principal')->first();
        return response()->json([
            'status' => true,
            'quote' => $principalMessage,
            'designation' => "Principal"
        ]);
    }

    public function profile(Request $request)
    {
        $studentId = $request->get('studentId');
        $profile= Student::query()->where('studentId',$studentId)->latest()->first();
        if ($profile){
            return response()->json([
                'status'=>true,
                'student'=>[
                    'personal'=>[
                        'name'=> $profile->name,
                        'student_id'=> $profile->studentId,
                        'picture'=> asset('storage/img/students').'/'.$profile->image,
                        'class'=> $profile->class->name ?? null,
                        'rank'=> $profile->rank,
                        'status'=> $profile->status == 1 ? 'Active' : 'Inactive',
                        'dob'=> date('d-m-Y', strtotime($profile->dob)),
                        'blood'=> $profile->bloodGroup->name,
                        'religion'=> $profile->religion->name,
                        'nationality'=> 'Bangladeshi',
                        'mobile'=> $profile->mobile,
                        'email'=> $profile->email,
                    ]
                ],
                'father'=>[
                    'name'=>$profile->father->f_name,
                    'mobile'=>$profile->father->f_mobile,
                    'occupation'=>$profile->f_occupation,
                ],
                'mother'=>[
                    'name'=>$profile->mother->m_name,
                    'mobile'=>$profile->mother->m_mobile,
                    'occupation'=>$profile->mother->m_occupation,
                ],
                'address'=>[
                    'city'=> $profile->city->name,
                    'country'=> $profile->country->name,
                    'postcode'=> $profile->zip,
                    'address'=> $profile->address,
                ]
            ]);
        }
        else{
            return response(null,204);
        }

    }

    public function events()
    {
        $events = UpcomingEvent::query()->paginate();
        if($events->count() > 0){
            $data = [];
            foreach($events as $event){
                $data[] = [
                    'id' => $event->id,
                    'title' => $event->title,
                    'date' => date('d-m-Y', strtotime($event->date)),
                    'image' => asset('assets/img/events').'/'.$event->image,
                    'location' => $event->venue
                ];
            }
            return response()->json([
                'status' => true,
                'events' => $data
            ]);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'No data found!',
                'events' => []
            ]);
        }
    }

    public function eventDetails(Request $request)
    {
        $event = UpcomingEvent::query()
            ->where('id',$request->id)
            ->first();
        if($event){
            return [
                'status' => true,
                'title' => $event->title,
                'body' => null,
                'date' => date('d-m-Y', strtotime($event->date)),
                'location' => $event->venue,
                'image' => asset('assets/img/events').'/'.$event->image
            ];
        }
        else{
            return response(null,204);
        }
    }


    public function teachers()
    {
        $teachers = Staff::query()->where('staff_type_id',2)->get();
        if($teachers->count() > 0){
            $data = [];
            foreach($teachers as $teacher){
                $data[] = [
                    'id' => $teacher->id,
                    'name' => $teacher->name,
                    'designation' => $teacher->staff_type_id == 2 ? 'Teacher' : 'Staff',
                    'phone' => $teacher->mobile,
                    'empNo' => $teacher->card_id,
                    'joiningDate' => $teacher->joining,
                    'email' => $teacher->email,
                    'image' => asset('assets/img/staffs').'/'.$teacher->image,
                ];
            }
            return response()->json([
                'status' => true,
                'teachers' => $data
            ]);
        }
        else
        {
            return response(null,204);
        }
    }

    public function teacherDetails(Request $request)
    {
        $teacher = Staff::query()
            ->where('staff_type_id',2)
            ->where('id',$request->id)
            ->first();
        if($teacher->count() > 0){
            return [
                'status' => true,
                'name' => $teacher->name,
                'designation' => $teacher->staff_type_id == 2 ? 'Teacher' : 'Staff',
                'phone' => $teacher->mobile,
                'empNo' => $teacher->card_id,
                'joiningDate' => $teacher->joining,
                'email' => $teacher->email,
                'image' => asset('assets/img/staffs').'/'.$teacher->image,
                'gender' => $teacher->gender->name,
                'bloodGroup' => $teacher->blood->name,
            ];
        }
        else{
            return response(null,204);
        }

    }

    public function syllabus(Request $request)
    {
        $student = Student::query()->where('studentId',$request->studentId)->latest()->first();
        $syllabus = Syllabus::query()->where('academic_class_id',$student->academic_class_id)->first();
        return ['file'=>asset('assets/syllabus').'/'.$syllabus->file];
    }

    public function noticeList()
    {
        $notices = Notice::query()->where('notice_type_id',2)->paginate(8);
        if($notices){
            return new NoticeCollection($notices);
        }
        else{
            return response(null,204);
        }
    }

    public function noticeDetails(Request $request)
    {
        $notice = Notice::query()
            ->where('id',$request->id)
            ->where('notice_type_id',2)
            ->first();
        $noticeCategory =  NoticeCategory::find($notice->notice_category_id);
        if($notice){
            return [
                'status'=>true,
                'notice' => [
                    'title' => $notice->title,
                    'body' => $notice->description,
                    'date' => date('d-m-Y', strtotime($notice->created_at)),
                    'category' => $noticeCategory->name ?? null,
                    'type' => $notice->notice_type_id == 1 ? 'News' : 'Notice',
                    'image' => asset('storage/uploads/notice/' . $notice->file),
                    'download_link' => null,
                    'facebook_link' => null,
                    'twitter_link' => null,
                    'linkedin_link' => null,
                ]
            ];
        }
        else{
            return response(null,204);
        }
    }

    public function newsList()
    {
        $newsList = Notice::query()->where('notice_type_id',1)->paginate();
        if($newsList){
            return new NewsCollection($newsList);
        }
        else{
            return response(null,204);
        }
    }

    public function newsDetails(Request $request)
    {
        $news = Notice::query()
            ->where('id',$request->id)
            ->where('notice_type_id',1)
            ->first();
        if($news){
            $noticeCategory =  NoticeCategory::find($news->notice_category_id);
            return [
                'status'=>true,
                'title' => $news->title,
                'body' => $news->description,
                'date' => date('d-m-Y', strtotime($news->created_at)),
                'category' => $noticeCategory->name,
                'type' => $news->notice_type_id == 1 ? 'News' : 'Notice',
                'image' => asset('storage/uploads/notice/' . $news->file),
                'download_link' => null,
                'facebook_link' => null,
                'twitter_link' => null,
                'linkedin_link' => null,

            ];
        }
        else{
            return response(null,204);
        }
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
