<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AssignSubject;
use App\Exam;
use App\ExamSchedule;
use App\Gender;
use App\Grade;
use App\Repository\ExamRepository;
use App\Session;
use App\Staff;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
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

    public function gradesystem()
    {
        $gradings = Grade::all();
       return view ('admin.exam.gradesystem', compact('gradings'));
    }

    public function store_grade(Request $request){
        //dd($request->all());
        Grade::query()->create($request->all());
        return redirect('exam/gradesystem')->with('success', 'Grading System Added Successfully');
    }

    public function delete_grade($id){
        $grade = Grade::query()->findOrFail($id);
        $grade->delete();
        return redirect('exam/gradesystem')->with('success', 'Grading System Deleted Successfully');
    }

    public function examination()
    {
        $exams = Exam::all();
        return view ('admin.exam.examination', compact('exams'));
    }

    public function store_exam(Request $request){
        if ($request->has('combined_exam_id')){
            $data = [
                'name' => $request->name,
                'combined_exam_id1' => $request->combined_exam_id[0],
                'notify' => $request->notify
            ];
            if(count($request->combined_exam_id)==2){
                $data['combined_exam_id2'] = $request->combined_exam_id[1];
            }
            Exam::query()->create($data);
        }else{
            Exam::query()->create($request->all());
        }
        return redirect('exam/examination')->with('success', 'Exam Added Successfully');

    }

    public function delete_exam($id){
        $exam = Exam::query()->findOrFail($id);
        $exam->delete();
        return redirect('exam/examination')->with('success', 'Exam Deleted Successfully');
    }

    public function examitems()
    {
        $sessions = Session::all()->pluck('year', 'id');
        $exams = Exam::all()->pluck('name', 'id');
        $classes = AcademicClass::all()->pluck('name', 'id');
        $schedules = ExamSchedule::all();
        $subjects = Subject::all()->pluck('name','id');
        return view ('admin.exam.examitems', compact('sessions', 'exams', 'classes', 'schedules','subjects'));
    }

    public function schedule(Request $request,$examId){
        //dd($examId);
        $session_id = $request->session_id;
        //$exam_id = $request->exam_id;
        $class_id = $request->class_id;
        $exam_type = $request->exam_type;
        $subjects = AssignSubject::query()->where('class_id', $class_id)->get();
        $teachers = Staff::all()->pluck('name', 'id')->prepend('Select Teacher', '')->toArray();

        $schedules = ExamSchedule::all();
        $sessions = Session::all()->pluck('year', 'id');
        $exams = Exam::all()->pluck('name', 'id');
        $classes = AcademicClass::all()->pluck('name', 'id');
        return view('admin.exam.examitems', compact('session_id', 'examId','schedules','sessions','exams','classes', 'class_id', 'exam_type', 'subjects', 'teachers'));
    }

    public function store_schedule(Request $request){
        //dd($request->all());
        $subjects = $request->subject_id;

        foreach($subjects as $idx => $sub){
            $data = [
                'session_id' => $request->session_id,
                'exam_id' => $request->exam_id,
                'class_id' => $request->class_id,
                'exam_type' => $request->exam_type,
                'subject_id' => $sub,
                'date' => $request->date[$idx],
                'start' => $request->start[$idx],
                'end' => $request->end[$idx],
                'teacher_id' => $request->teacher_id[$idx]
            ];
            $is_exists = ExamSchedule::query()
                ->where('session_id', $request->session_id)
                ->where('class_id', $request->class_id)
                ->where('exam_id', $request->exam_id)
                ->where('subject_id', $sub)
                ->first();
            if ($is_exists == null){
                ExamSchedule::query()->create($data);
            }else{
                $is_exists->update($data);
            }
        }
        return redirect('exam/examitems')->with('success', 'Exam Schedule Saved Successfully');
    }

    public function examresult()
    {
        $repository = $this->repository;
        return view ('admin.exam.examresult',compact('repository'));
    }

    public function setfinalresultrule()
    {
        return view ('admin.exam.setfinalresultrule');
    }

    /**
     * @param Student $student
     * @param Request $request
     * Created by smartrahat
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function admitCard(Student $student, Request $request)
    {
        if($request->all() == []){
            $students = [];
        }else{
            $s = $student->newQuery();
            if($request->get('studentId')){
                $studentId = $request->get('studentId');
                $s->where('studentId',$studentId);
            }
            if($request->get('name')){
                $name = $request->get('name');
                $s->where('name','like','%'.$name.'%');
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
        }

        $repository = $this->repository;
        return view('admin.exam.admit-card',compact('repository','students'));
    }

    public function seatAllocate(Request $request)
    {
        return view('admin.exam.seat-allocate');
    }

    public function resultDetails()
    {
        return view('admin.exam.result-details');
    }

    public function marks()
    {
        $students = Student::query()
            ->where('session_id',2)
            ->where('class_id',9)
           // ->where('group_id',1)
            ->get();
        return view('admin.exam.marks',compact('students'));
    }

    public function tabulationSheet()
    {
        return view('admin.exam.tabulation-sheet');
    }


}
