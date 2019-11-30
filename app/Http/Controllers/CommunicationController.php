<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepository;
use App\Student;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommunicationController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function student(Request $request, Student $student)
    {
        $s = $student->newQuery();
        if($request->get('studentId')){
            $studentId = $request->get('studentId');
            $s->where('studentId',$studentId);
        }
        if($request->get('session_id')){
            $session = $request->get('session_id');
            $s->where('session_id',$session);
        }
        if($request->get('class_id')){
            $class = $request->get('class_id');
            $s->where('class_id',$class);
        }
        if($request->get('section_id')){
            $section = $request->get('section_id');
            $s->where('section_id',$section);
        }
        if($request->get('group_id')){
            $group = $request->get('group_id');
            $s->where('group_id',$group);
        }

        $students = $s->get();
        $repository = $this->repository;
        return view('admin.communication.student-sms',compact('repository','students'));
    }

    public function staff()
    {
        return view('admin.communication.staff-sms');
    }

    public function history()
    {
        return view('admin.communication.history-sms');
    }

    public function send(Request $request)
    {
        $ids = $request->get('id');
        $request->number = Student::query()->whereIn('id',$ids)->pluck('mobile')->toArray();

        $api_key = "C20051365de1fe31bd00d3.94191772";
        $contacts = $request->get('number');
        $senderid = 8809601000500;
        $sms = $request->get('message');
        $URL = "http://bangladeshsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".urlencode($contacts)."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$URL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POST, 0);

//        try{
//            $output = $content=curl_exec($ch);
//            print_r($output);
//        }catch(Exception $ex){
//            $output = "-100";
//        }
//        dd($output);

        Session::flash('success','SMS sent!');

        return redirect()->back();
    }


}
