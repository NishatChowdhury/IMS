<?php

namespace Modules\ExamAndResult\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\Exam;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\Session;
use App\Models\Backend\Staff;
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

    public function index(Request $request,$examId){
//        ExamSchedule::truncate();
//        dd('done');
        $session_id = $request->session_id;
        //$exam_id = $request->exam_id;
        $class_id = $request->class_id;
        $exam_type = $request->exam_type;
        $subjects = AssignSubject::query()->where('academic_class_id', $class_id)->get();
        $teachers = Staff::all()->pluck('name', 'id')->prepend('Select Teacher', '')->toArray();

        $sc = ExamSchedule::query()->where('exam_id',$examId)->with('academicClassName')->get();
        $schedules = $sc->groupBy('academic_class_id');
        $sessions = Session::all()->pluck('year', 'id');
        $exams = Exam::all()->pluck('name', 'id');
        $classes = AcademicClass::all()->pluck('name', 'id');

        return view('examandresult::exam-schedule.index', compact('session_id', 'examId','schedules','sessions','exams','classes', 'class_id', 'exam_type', 'subjects', 'teachers'));


    }

    public function create(Request $request,$examId)
    {
//        return $request->all();
        $exam = Exam::query()->findOrFail($examId);
        $sessions = Session::query()->where('active',1)->pluck('year','id');
        $repository = $this->repository;

        $class = $request->get('academic_class_id');
        $ClassId = AcademicClass::query()->where('id', $class)->first();

        if($class){

            $isExist = ExamSchedule::query()
                ->where('academic_class_id',$class)
                //->where('class_id',$class)
                ->where('exam_id',$examId)
                ->exists();

            if($isExist){
                 $subjects = ExamSchedule::query()
                    ->where('academic_class_id',$class)
                    //->where('class_id',$class)
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

        return view('examandresult::exam-schedule.create',compact('repository','class','subjects','exam','sessions','ClassId'));
    }

    public function store(Request $request)
    {

        $subjects = $request->get('subject_id');

        foreach($subjects as $key => $subject){
            if($request->get('date')[$key] != null){
                $data['exam_id'] = $request->get('exam_id');
                $data['academic_class_id'] = $request->get('academic_class_id');
                $data['subject_id'] = $request->get('subject_id')[$key];
                $data['date'] = $request->get('date')[$key] ?? '';
                $data['start'] = $request->get('start')[$key];
                $data['end'] = $request->get('end')[$key];
                $data['objective_full'] = $request->get('objective_full')[$key];
                $data['objective_pass'] = $request->get('objective_pass')[$key];
                $data['written_full'] = $request->get('written_full')[$key];
                $data['written_pass'] = $request->get('written_pass')[$key];
                $data['practical_full'] = $request->get('practical_full')[$key];
                $data['practical_pass'] = $request->get('practical_pass')[$key];

                $schedule = ExamSchedule::query()
                    ->where('academic_class_id',$request->get('academic_class_id'))
                    ->where('exam_id',$request->get('exam_id'))
                    ->where('subject_id',$subject)
                    ->first();

                if($schedule != null){
                    $schedule->update($data);
                    \Illuminate\Support\Facades\Session::flash('success','Exam Schedule updated successfully!');
                }else{
//                    return $data;
                    ExamSchedule::query()->create($data);
                    \Illuminate\Support\Facades\Session::flash('success','Exam Schedule created successfully!');
                }

            } // end if
        } // end foreach

        return redirect()->back();
    }
}
