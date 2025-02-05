<?php

namespace Modules\ExamAndResultV2\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\Classes;
use App\Models\Backend\Exam;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\FinalResult;
use App\Models\Backend\Grade;
use App\Models\Backend\Mark;
use App\Models\Backend\Session;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\Subject;
use App\Models\ResultSystem;
use App\Repository\ExamRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        return view ('examandresult::exam.gradesystem', compact('gradings'));
    }

    public function store_grade(Request $request){
        Grade::query()->create($request->all());
        return redirect('admin/exam/gradesystem')->with('success', 'Grading System Added Successfully');
    }

    public function delete_grade($id){
        $grade = Grade::query()->findOrFail($id);
        $grade->delete();
        return redirect('admin/exam/gradesystem')->with('success', 'Grading System Deleted Successfully');
    }








    public function resultSystem(){
        $subjects = Subject::query()->get();
        $resultSystem = ResultSystem::query()->with('firstSubject','secondSubject')->get();
        return view ('examandresultv2::exam.result-system',compact('subjects','resultSystem'));
    }

    public function resultSystemStore(Request $request){
        ResultSystem::query()->create($request->all());
        return redirect('admin/exam/result-system');
    }

    public function resultSystemEdit($id)
    {
        $resultSystem =  ResultSystem::find($id)->selected_value;
        $subjects = Subject::all();
        return view ('examandresult::exam.edit-result-system',compact('resultSystem','subjects'));
    }

    public function resultSystemUpdate($id,Request $request)
    {
        $page = Page::query()->findOrFail($id);

        if($request->hasFile('image')){
            $name = $id.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/pages/', $name);
            $data = $request->except('image');
            $data['image'] = $name;
            $page->update($data);
        }else{
            $page->update($request->all());
        }

        return redirect('admin/pages');
    }

    function  resultSystemDestroy($id){
        $page = Page::query()->findOrFail($id);
        $page->delete();
        return back();
    }









    public function examination()
    {
        $exams = Exam::whereHas('session', function($q){
            return $q->where('active', 1);
        })->get();
        $repository = $this->repository;
        return view ('examandresult::exam.examination', compact('exams','repository'));
    }

    public function store_exam(Request $request){
        Exam::query()->create($request->all());
        return redirect('admin/exam/examination')->with('success', 'Exam Added Successfully');
    }

    public function destroy($id){
        $exam = Exam::query()->findOrFail($id);
        $exam->delete();
        return redirect('admin/exam/examination')->with('success', 'Exam Deleted Successfully');
    }

    public function examitems()
    {
        $sessions = Session::all()->pluck('year', 'id');
        $exams = Exam::all()->pluck('name', 'id');
        $classes = AcademicClass::all()->pluck('name', 'id');
        $schedules = ExamSchedule::all();
        $subjects = Subject::all()->pluck('name','id');
        return view ('examandresult::exam.examitems', compact('sessions', 'exams', 'classes', 'schedules','subjects'));
    }

    public function store_schedule(Request $request){
        dd('deprecated');
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
        return redirect('admin/exam/examitems')->with('success', 'Exam Schedule Saved Successfully');
    }

    /**
     * @param StudentAcademic $student
     * @param Request $request
     * Created by smartrahat
     * @param $exam_id
     * @return Factory|View
     */
    public function admitCard(StudentAcademic $student, Request $request, $exam_id)
    {
        if($request->all() == []){
            $students = [];
            $exam = [];
            $schedules = [];
            $academicClass = [];
        }else{
            $s = $student->newQuery();
            if($request->get('studentId')){
                $studentId = $request->get('studentId');
                $s->whereHas('student', function($query) use($studentId){
                    $query->where('studentId', $studentId);
                });
            }

            if($request->get('academic_class')){
                $class = $request->get('academic_class');
                $s->where('academic_class_id',$class);
            }
//            if($request->get('section_id')){
//                $section = $request->get('section_id');
//                $s->where('section_id',$section);
//            }
//            if($request->get('group_id')){
//                $group = $request->get('group_id');
//                $s->where('group_id',$group);
//            }

            $students = $s->with('student')->get();

            $exam = Exam::query()->findOrFail($exam_id);

            $academicClass = AcademicClass::query()->findOrFail($request->get('academic_class'));

            $schedules = ExamSchedule::query()
                ->where('exam_id',$request->get('exam_id'))
                ->where('academic_class_id',$request->get('academic_class'))
                ->orderBy('date')
                ->get();
        }

        $repository = $this->repository;
        return view('examandresult::exam.admit-card',compact('repository','academicClass','students','exam','schedules'));
    }

    public function seatAllocate(Request $request)
    {
        return view('examandresult::exam.seat-allocate');
    }

    public function marks()
    {
        $students = Student::query()
            ->where('session_id',2)
            ->where('class_id',9)
            // ->where('group_id',1)
            ->get();
        return view('examandresult::exam.marks',compact('students'));
    }

    public function upload()
    {
        return view('admin.test.upload');
    }

    public function bulkUpload()
    {
        return view('admin.test.bulk-upload');
    }

    public function file(Request $request)
    {
        $file = file($request->file('file'));
        $sl = 0;
        foreach($file as $row){

            if ($sl!=0){

                $col = explode(',',$row);

                $data['session_id'] = 1;
                $data['exam_id'] = 1;
                $data['class_id'] = 1;
                $data['group_id'] = 1;
                $data['subject_id'] = $request->get('subject_id');

                $student = Student::query()
                    ->where('session_id',$data['session_id'])
                    ->where('class_id',$data['class_id'])
                    //->where('section_id',$data['section_id'])
                    ->where('group_id',$data['group_id'])
                    ->where('rank',$col[0])
                    ->first();

                $isExist = Mark::query()
                    ->where('session_id',$data['session_id'])
                    ->where('exam_id',$data['exam_id'])
                    ->where('class_id',$data['class_id'])
                    ->where('subject_id',$data['subject_id'])
                    ->where('student_id',$student->id)
                    ->first();

                $data['student_id'] = $student->id;
                $data['section_id'] = $student->section_id;
                $data['group_id'] = $student->group_id;
                $data['studentId'] = $student->studentId;
                $data['grade_id'] = 1;
                $data['full_mark'] = 100;
                $data['objective'] = (int)$col[1];
                $data['written'] = (int)$col[2];
                $data['practical'] = (int)$col[3];
                $data['viva'] = 0;

                $passMark = ExamSchedule::query()
                    ->where('session_id',$data['session_id'])
                    ->where('exam_id',$data['exam_id'])
                    ->where('class_id',$data['class_id'])
                    ->where('subject_id',$data['subject_id'])
                    ->first();

                if($passMark->objective_pass > $data['objective'] || $passMark->written_pass > $data['written'] || $passMark->practical_pass > $data['practical'] || $passMark->viva_pass > $data['viva']){
                    $total = 0;

                    $data['total_mark'] = $total;
                    $data['gpa'] = 0;
                    $data['grade'] = 'F';
                }else{
                    $total = (int)$col[1] + (int)$col[2] + (int)$col[3];

                    $data['total_mark'] = $total;
                    $data['gpa'] = $this->gpa(100,$total,$data['grade_id']);
                    $data['grade'] = $this->grade(100,$total,$data['grade_id']);
                }


                if($isExist){
                    $isExist->update($data);
                }else{
                    Mark::query()->create($data);
                }
            }

            $sl++;

        }
        return redirect()->back();
    }

    public function bulkFile(Request $request)
    {
        $file = file($request->file('file'));
        $sl=0;
        foreach($file as $row){

            if ($sl!=0){

                $col = explode(',',$row);

                $rank = $col[0];
                $name = $col[1];
                $gpa = $col[2];
                $grade = $col[3];
                $total_mark = $col[4];
                $precent = $col[5];
                $new_rank = $col[6];
                $subjects['1'] = (int)$col[2];
                $subjects['2'] = (int)$col[3];
                $subjects['3'] = (int)$col[4];
                $subjects['4'] = (int)$col[5];
                $subjects['8'] = (int)$col[6];
                $subjects['5'] = (int)$col[7];
                $subjects['9'] = (int)$col[8];
                $subjects['6'] = (int)$col[9];
                $subjects['7'] = (int)$col[10];
                //$total_point = $col[16];

                $data['session_id'] = 2;
                $data['exam_id'] = $request->get('exam_id');
                $data['class_id'] = $request->get('class_id');
                $data['section_id'] = $request->get('section_id');

                $student = Student::query()
                    ->where('class_id',$data['class_id'])
                    ->where('section_id',$data['section_id'])
                    ->where('rank',$rank)
                    ->first();

                if(!$student){
                    return redirect()->back();
                }

                foreach($subjects as $key => $subject){
                    $mark = Mark::query()
                        ->where('session_id',$data['session_id'])
                        ->where('exam_id',$data['exam_id'])
                        ->where('class_id',$data['class_id'])
                        ->where('subject_id',$key)
                        ->where('student_id',$student->id)
                        ->first();

                    $data['subject_id'] = $key;
                    $data['student_id'] = $student->id;
                    $data['studentId'] = $student->studentId;
                    $data['grade_id'] = $data['class_id'] <= 7 ? 2 : 1;
                    $data['full_mark'] = 100;
                    $data['objective'] = 0;
                    $data['written'] = (int)$subject;
                    $data['practical'] = 0;
                    $data['viva'] = 0;

                    //$total = (int)$col[11] + (int)$col[12] + (int)$col[13] + (int)$col[14];

                    $data['total_mark'] = (int)$subject;
                    $data['gpa'] = $this->gpa($data['full_mark'],(int)$subject,$data['grade_id']);
                    $data['grade'] = $this->grade($data['full_mark'],(int)$subject,$data['grade_id']);
                    if($mark){
                        $mark->update($data);
                    }else{
                        Mark::query()->create($data);
                    }
                }

            }

            $sl++;

        }
        return redirect()->back();
    }

    public function gpa($full,$totalMark,$gradeId)
    {
        $total = ($totalMark * 100)/$full;
        $grade = Grade::query()
            ->where('system',$gradeId)
            ->where('mark_from','<=',$total)
            ->where('mark_to','>=',$total)
            ->first();

        return $grade->point_from;
    }

    public function grade($full,$totalMark,$gradeId)
    {
        $total = ($totalMark * 100)/$full;
        $grade = Grade::query()
            ->where('system',$gradeId)
            ->where('mark_from','<=',$total)
            ->where('mark_to','>=',$total)
            ->first();

        return $grade->grade;
    }

    public function tabulationSheet(Request $request, FinalResult $finalResult)
    {
        if($request->has('class_id')){
            $r = $finalResult->newQuery();
            if($request->get('class_id')){
                $class = $request->get('class_id');
                $r->where('class_id',$class);
            }
            if($request->get('section_id')){
                $section = $request->get('section_id');
                $r->where('section_id',$section);
            }
            if($request->get('group_id')){
                $group = $request->get('group_id');
                $r->where('group_id',$group);
            }
            $results = $r->orderBy('rank')->get();
            $subjects = $this->tabulationSubjects($request->get('class_id'),$request->get('group_id'));
        }else{
            $results = collect();
            $subjects = null;
        }
        //dd($request->get('group_id').' '.$request->get('class_id'));
        $results = $results->count() == 0 ? null : $results;
        $repository = $this->repository;
        return view('examandresult::exam.tabulation-sheet',compact('repository','results','subjects'));
    }

    public function tabulationSubjects($classId,$groupId = null)
    {
        if($classId == 11){
            if($groupId == 1){
                $subjects = AssignSubject::query()
                    ->where('class_id',$classId)
                    ->whereNotIn('subject_id',[6,12,19,20,21,22,23,24])
                    //->orderBy('level')
                    ->get();
            }elseif($groupId == 2){
                $subjects = AssignSubject::query()
                    ->where('class_id',$classId)
                    ->whereNotIn('subject_id',[5,16,17,18,22,23,24,25])
                    //->orderBy('level')
                    ->get();
            }elseif($groupId == 3){
                $subjects = AssignSubject::query()
                    ->where('class_id',$classId)
                    ->whereNotIn('subject_id',[5,16,17,18,19,20,21,25])
                    //->orderBy('level')
                    ->get();
            }else{
                $subjects = null;
            }
        }else{
            $subjects = AssignSubject::query()
                ->where('class_id',$classId)
                //->orderBy('level')
                ->get();
        }
        return $subjects;
    }


}
