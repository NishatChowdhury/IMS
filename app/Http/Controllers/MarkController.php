<?php

namespace App\Http\Controllers;

use App\ExamSchedule;
use App\Mark;
use App\Student;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($schedule)
    {
        $schedule = ExamSchedule::query()->findOrFail($schedule);

        $isExist = Mark::query()
            ->where('session_id',$schedule->session_id)
            ->where('class_id',$schedule->class_id)
            ->where('exam_id',$schedule->exam_id)
            ->where('subject_id',$schedule->subject_id)
            //->where('student_id',$request->get('student_id'))
            ->exists();

        if($isExist){
            $students = Mark::query()
                ->where('session_id',$schedule->session_id)
                ->where('class_id',$schedule->class_id)
                ->where('exam_id',$schedule->exam_id)
                ->where('subject_id',$schedule->subject_id)
                //->where('student_id',$request->get('student_id'))
                ->get();
        }else{
            $students = Student::query()
                ->where('session_id',2)
                ->where('class_id',9)
                // ->where('group_id',1)
                ->get();
        }


        return view('admin.exam.marks',compact('students','schedule'));
    }

    public function store(Request $request)
    {
        $students = $request->get('student_id');

        foreach($students as $key => $student){
            $data['session_id'] = $request->get('session_id');
            $data['class_id'] = $request->get('class_id');
            $data['exam_id'] = $request->get('exam_id');
            $data['subject_id'] = $request->get('subject_id');
            $data['student_id'] = $request->get('student_id')[$key];
            $data['objective'] = $request->get('objective')[$key];
            $data['written'] = $request->get('written')[$key];
            $data['practical'] = $request->get('practical')[$key];
            $data['viva'] = $request->get('viva')[$key];
            $data['full_mark'] = ExamSchedule::query()->findOrFail($request->get('exam_id'))->mark;
            $data['total_mark'] = $request->get('objective')[$key] + $request->get('written')[$key] + $request->get('practical')[$key] + $request->get('viva')[$key];
            $data['gpa'] = null;
            $data['grade'] = null;

            $marks = Mark::query()
                ->where('session_id',$request->get('session_id'))
                ->where('class_id',$request->get('class_id'))
                ->where('exam_id',$request->get('exam_id'))
                ->where('subject_id',$request->get('subject_id'))
                ->where('student_id',$request->get('student_id'))
                ->first();

            if($marks != null){
                $marks->update($data);
            }else{
                Mark::query()->create($data);
            }
        }

        return redirect()->back();
    }
}
