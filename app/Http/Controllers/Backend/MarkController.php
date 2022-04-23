<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\Grade;
use App\Models\Backend\Mark;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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
            //->where('session_id',$schedule->session_id)
            //->where('class_id',$schedule->class_id)
            ->where('academic_class_id',$schedule->academic_class_id)
            ->where('exam_id',$schedule->exam_id)
            ->where('subject_id',$schedule->subject_id)
            //->where('student_id',$request->get('student_id'))
            ->exists();

        if($isExist){
            $students = Mark::query()
                //->where('session_id',$schedule->session_id)
                //->where('class_id',$schedule->class_id)
                ->where('academic_class_id',$schedule->academic_class_id)
                ->where('exam_id',$schedule->exam_id)
                ->where('subject_id',$schedule->subject_id)
                //->where('student_id',$request->get('student_id'))
                ->get();
            $table = 'marks';
        }else{
            $students = StudentAcademic::query()
                                        ->where('academic_class_id', $schedule->class_id)
                                        ->where('session_id',$schedule->session_id)
                                        ->orderBy('rank')
                                        ->get();
             $table = 'students';
//             return $students;
        }

        return view('admin.exam.marks',compact('students','schedule','table'));
    }

    public function download($schedule)
    {

        // class_id means amademic_class_id

        $schedule = ExamSchedule::query()->findOrFail($schedule);

        $table = StudentAcademic::query()->where('academic_class_id',$schedule->class_id)->get();

        $group = $schedule->academicClassName->group != null ? $schedule->academicClassName->group->name : '';
        $section = $schedule->academicClassName->section != null ? $schedule->academicClassName->section->name : '';
        $filename = $schedule->academicClassName->classes->name.$group.$section.$schedule->subject->short_name.".csv";

        $handle = fopen($filename, 'w+');

        // student_id means student academic Id



        fputcsv($handle, [
            'roll',
            'name',
            'class',
            'student_id',
            'objective',
            'written',
            'practical',
            'viva',
        ]);

        foreach($table as $row) {
            $getMarks = Mark::where('student_id', $row->id)->first();
            fputcsv($handle, [
                $row['rank'],
                $row->student->name,
                $row->classes->name,
                $row->student->id,
                $getMarks->objective ?? '',
                $getMarks->written ?? '',
                $getMarks->practica ?? '',
                $getMarks->viva ?? '',
            ]);
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, $filename, $headers);
    }

    public function upload($schedule)
    {
        $schedule = ExamSchedule::query()->findOrFail($schedule);
        return view('admin.exam.upload',compact('schedule'));
    }

    public function up(Request $request)
    {
        $schedule = ExamSchedule::query()->findOrFail($request->schedule);

        $file = file($request->file('file'));

        $sl = 0;
        foreach($file as $row){
            if($sl != 0){
                $col = explode(',',$row);

                $data['academic_class_id'] = $schedule->academic_class_id;
                $data['exam_id'] = $schedule->exam_id;
                $data['subject_id'] = $schedule->subject_id;
                $data['student_id'] = $col[3];
                //$data['studentId'] = $academicClass->class_id;
                $data['full_mark'] = $schedule->objective_full + $schedule->written_full + $schedule->practical_full + $schedule->viva_full;
                $data['objective'] = (int)$col[4];
                $data['written'] = (int)$col[5];
                $data['practical'] = (int)$col[6];
                $data['viva'] = (int)$col[7];
                $data['total_mark'] = (int)$col[4] + (int)$col[5] + (int)$col[6] + (int)$col[7];

                if($schedule->objective_pass > $data['objective'] || $schedule->written_pass > $data['written'] || $schedule->practical_pass > $data['practical'] || $schedule->viva_pass > $data['viva']){
                    $data['gpa'] = 0;
                    $data['grade'] = 'F';
                }else{
                    $data['gpa'] = $this->gpa($data['total_mark']);
                    $data['grade'] = $this->grade($data['total_mark']);
                }

                $data['grade_id'] = 1;

                $mark = Mark::query()
                    ->where('student_id',$col[3])
                    ->where('academic_class_id',$schedule->academic_class_id)
                    ->where('exam_id',$schedule->exam_id)
                    ->where('subject_id',$schedule->subject_id)
                    ->first();

                if($mark){
                    $mark->update($data);
                }else{
                    Mark::query()->create($data);
                }

            }
            $sl++;
        }

        return redirect()->back();
    }

    public function store(Request $request)
    {
//        return $request->all();
        $students = $request->get('student_id');

         $schedule = ExamSchedule::query()
            ->where('exam_id',$request->exam_id)
            ->where('subject_id',$request->subject_id)
            ->where('class_id',$request->academic_class_id)
            ->first();

        foreach($students as $key => $student){

            $getClassID = AcademicClass::where('id', $request->get('academic_class_id'))->first();


            $data['session_id'] = 0;
            $data['academic_class_id'] = $request->get('academic_class_id');
            $data['class_id'] = $getClassID->class_id;
            $data['exam_id'] = $request->get('exam_id');
            $data['subject_id'] = $request->get('subject_id');
            $data['student_id'] = $request->get('student_id')[$key];
            $data['objective'] = $request->get('objective')[$key];
            $data['written'] = $request->get('written')[$key];
            $data['practical'] = $request->get('practical')[$key];
            $data['viva'] = $request->get('viva')[$key];
            $data['full_mark'] = ExamSchedule::all()
                                                ->where('exam_id',$request->get('exam_id'))
                                                ->where('subject_id',$request->get('subject_id'))
                                                ->where('class_id',$request->get('academic_class_id'))
                                                ->sum(function($t){return $t->objective_full + $t->written_full;});
            $data['total_mark'] = $request->get('objective')[$key] + $request->get('written')[$key] + $request->get('practical')[$key] + $request->get('viva')[$key];



            if($schedule->objective_pass > $data['objective'] || $schedule->written_pass > $data['written'] || $schedule->practical_pass > $data['practical'] || $schedule->viva_pass > $data['viva']){
                $data['gpa'] = 0;
                $data['grade'] = 'F';
            }else{
                $data['gpa'] = $this->gpa($data['total_mark']);
                $data['grade'] = $this->grade($data['total_mark']);
            }

            //$data['gpa'] = $this->gpa($data['total_mark']);
            //$data['grade'] = $this->grade($data['total_mark']);

            $marks = Mark::query()
                //->where('session_id',$request->get('session_id'))
                //->where('class_id',$request->get('class_id'))
                ->where('academic_class_id',$request->get('academic_class_id'))
                ->where('exam_id',$request->get('exam_id'))
                ->where('subject_id',$request->get('subject_id'))
                ->where('student_id',$request->get('student_id')[$key])
                ->first();

            if($marks != null){
                $marks->update($data);
            }else{
                Mark::query()->create($data);
            }
        }

        return redirect()->back();
    }

    public function grade($total)
    {
        $grade = Grade::query()
            ->where('mark_from','<=',$total)
            ->where('mark_to','>=',$total)
            ->first();

        return $grade->grade;
    }

    public function gpa($total)
    {


        $grade = Grade::query()
            ->where('mark_from','<=',$total)
            ->where('mark_to','>=',$total)
            ->first();
        return $grade->point_from;
    }
}
