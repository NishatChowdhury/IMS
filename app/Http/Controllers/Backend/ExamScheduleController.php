<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Exam;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\Session;
use App\Models\Backend\Subject;
use App\Repository\ExamRepository;
use Illuminate\Http\Request;

class ExamScheduleController extends Controller
{
    /**
     * @var ExamRepository
     */
    private $repository;

    public function __construct(ExamRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function create(Request $request,$examId)
    {
//        dd($request->all());
          $exam = Exam::query()->findOrFail($examId);
          $sessions = Session::where('active',1)->pluck('year','id');
        $repository = $this->repository;

        $class = $request->get('academic_class_id');
         $ClassId = AcademicClass::where('id', $class)->first();
        //$session = $request->get('session_id');

        if($class){

            $isExist = ExamSchedule::query()
                ->where('session_id',$exam->session_id)
//                ->where('academic_class_id',$class)
                ->where('exam_id',$examId)
                ->exists();

            if($isExist){
                $subjects = ExamSchedule::query()
                    ->where('session_id',$exam->session_id)
//                    ->where('academic_class_id',$class)
                    ->where('exam_id',$examId)
                    ->get();
            }else{
                 $subjects = Subject::query()
                    ->whereHas('ass_subject',function($query) use($class){
                        $query->where('academic_class_id',$class);
                    })->get();
            }
        }else{
            $subjects = [];
        }

        return view('admin.exam.exam-schedule',compact('repository','class','subjects','exam','sessions','ClassId'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        $subjects = $request->get('subject_id');

        foreach($subjects as $key => $subject){
            if($request->get('date')[$key] != null){
                $data['session_id'] = $request->get('session_id');
                $data['exam_id'] = $request->get('exam_id');
                $data['class_id'] = $request->get('class_id');
                $data['academic_class_id'] = $request->get('academic_classes');
                $data['subject_id'] = $request->get('subject_id')[$key];
                $data['date'] = $request->get('date')[$key];
                $data['start'] = $request->get('start')[$key];
                $data['end'] = $request->get('end')[$key];
                $data['objective_full'] = $request->get('objective_full')[$key];
                $data['objective_pass'] = $request->get('objective_pass')[$key];
                $data['written_full'] = $request->get('written_full')[$key];
                $data['written_pass'] = $request->get('written_pass')[$key];
                $data['practical_full'] = $request->get('practical_full')[$key];
                $data['practical_pass'] = $request->get('practical_pass')[$key];

                $schedule = ExamSchedule::query()
                    ->where('session_id',$request->get('session_id'))
                    ->where('class_id',$request->get('class_id'))
                    ->where('exam_id',$request->get('exam_id'))
                    ->where('subject_id',$subject)
                    ->first();

                if($schedule != null){
                    $schedule->update($data);
                    \Illuminate\Support\Facades\Session::flash('success','Exam Schedule updated successfully!');
                }else{
                    ExamSchedule::query()->create($data);
                    \Illuminate\Support\Facades\Session::flash('success','Exam Schedule created successfully!');
                }

            } // end if
        } // end foreach

        return redirect()->back();
    }
}
