<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\ExamSchedule;
use App\Session;
use App\Subject;
use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request,$exam)
    {
        $classes = AcademicClass::all()->pluck('name','id');
        $session = Session::all()->where('active',1)->first();

        $class = $request->get('class_id');

        if($class){

            $isExist = ExamSchedule::query()
                ->where('session_id',$session->id)
                ->where('class_id',$class)
                ->where('exam_id',$exam)
                ->exists();

            if($isExist){
                $subjects = ExamSchedule::query()
                    ->where('session_id',$session->id)
                    ->where('class_id',$class)
                    ->where('exam_id',$exam)
                    ->get();
            }else{
                $subjects = Subject::query()
                    ->whereHas('ass_subject',function($query) use($class){
                        $query->where('class_id',$class);
                    })->get();
            }
        }else{
            $subjects = [];
        }

        return view('admin.exam.exam-schedule',compact('classes','class','subjects','exam','session'));
    }

    public function store(Request $request)
    {
        $subjects = $request->get('subject_id');

        foreach($subjects as $key => $subject){
            $data['session_id'] = $request->get('session_id');
            $data['exam_id'] = $request->get('exam_id');
            $data['class_id'] = $request->get('class_id');
            $data['subject_id'] = $request->get('subject_id')[$key];
            $data['date'] = $request->get('date')[$key];
            $data['start'] = $request->get('start')[$key];
            $data['end'] = $request->get('end')[$key];
            $data['mark'] = $request->get('mark')[$key];
            $data['type'] = $request->get('type')[$key];

            $schedule = ExamSchedule::query()
                ->where('session_id',$request->get('session_id'))
                ->where('class_id',$request->get('class_id'))
                ->where('exam_id',$request->get('exam_id'))
                ->where('subject_id',$subject)
                ->first();

            if($schedule != null){
                $schedule->update($data);
            }else{
                ExamSchedule::query()->create($data);
            }

        }

        return redirect()->back();
    }
}
