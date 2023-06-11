<?php

namespace App\Http\Controllers\Flutter;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Attendance;
use App\Models\Backend\Classes;
use App\Models\Backend\Exam;
use App\Models\Backend\ExamResult;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\Group;
use App\Models\Backend\LeavePurpose;
use App\Models\Backend\Section;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentLeave;
use App\Models\Backend\Subject;
use App\Models\Diary;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    // To retrieve all diaries
    public function diaries(Request $request)
    {
        $date = $request->date ?? Carbon::parse()->format('Y-m-d');
        $day = Carbon::createFromFormat('Y-m-d', $date)->format('l');
        $diary = Diary::query()
            ->whereDate('date', $date)
            ->where('academic_class_id', $request->academic_class_id)
            ->get();
        $academic_class = AcademicClass::query()->where('id', $request->academic_class_id)->first();
        $className = Classes::query()->where('id', $academic_class->class_id)->first();
        $groupName = Group::query()->where('id', $academic_class->group_id)->first();
        $sectionName = Section::query()->where('id', $academic_class->section_id)->first();

        if ($diary->isNotEmpty()) {
            $data = [];
            foreach ($diary as $d) {
                $data[] = [
                    'id' => $d->id,
                    'subject' => $d->subject->name,
                    'diary' => $d->description,
                ];
            }
            return response()->json([
                'status' => true,
                'class' => $className->name ?? '',
                'group' => $groupName->name ?? '',
                'section' => $sectionName->name ?? '',
                'date' => $date,
                'diaries' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve a single diary
    public function diary(Request $request)
    {
        $diary = Diary::query()->where('id', $request->id)->first();
        $subject = $diary->subject->name ?? '';
        $teacher = $diary->teacher->name ?? '';
        if ($diary) {
            return [
                'status' => true,
                'diary' => [
                    'id' => $request->id,
                    'subject' => $subject,
                    'date' => date('d-m-Y', strtotime($diary->date)),
                    'teacher' => $teacher,
                    'description' => $diary->description
                ],
            ];
        } else {
            return response(null, 204);
        }
    }
    // To add a new diary
    public function addDiary(Request $request)
    {
        $request->validate([
            'academic_class_id' => 'required',
            'date' => 'required|date',
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'description' => 'required'
        ]);
        $request['academic_class_id'] = $request->academic_class_id;
        $request['date'] = $request->date;
        $request['teacher_id'] = $request->teacher_id;
        $request['subject_id'] = $request->subject_id;
        $request['description'] = $request->description;
        $result = Diary::query()->create($request->all());
        if ($result) {
            return response()->json(['status' => true, 'Diary' => $result]);
        } else {
            return response()->json(['status' => false]);
        }
    }

        // To retrieve all Leave Purposes
        public function leavePurposes(){
            $purposes = LeavePurpose::query()->get();
            if ($purposes->isNotEmpty()) {
                $data = [];
                foreach ($purposes as $purpose) {
                    $data[] = [
                        'id' => $purpose->id,
                        'name' => $purpose->leave_purpose
                    ];
                }
                return response()->json([
                    'status' => true,
                    'leavePurposes' => $data
                ]);
            } else {
                return response(null, 204);
            }
        }

        // To retrieve all leaves
        public function allLeaves(){
            $leaves = StudentLeave::query()->get();
            if ($leaves->isNotEmpty()) {
                $data = [];
                foreach ($leaves as $leave) {
                    $data[] = [
                        'id' => $leave->id ?? '',
                        'leaveID' => $leave->leaveId ?? '',
                        'studentID' => $leave->student_id ?? '',
                        'date' => $leave->date ?? '',
                        'leavePurpose' => $leave->purpose->leave_purpose ?? '',
                        'leaveID' => $leave->leaveId ?? '',
                    ];
                }
                return response()->json([
                    'status' => true,
                    'leaves' => $data
                ]);
            } else {
                return response(null, 204);
            }
        }

    // To add a new leave
    public function addLeave(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        if (!$end) {
            $end = $start;
        }

        $period = CarbonPeriod::create($start, $end);

        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            $data = [
                'leaveId' => date('ymd') . $request->student_id,
                'student_id' => $request->student_id,
                'date' => $d,
                'leave_purpose_id' => $request->leave_purpose_id,
                'teacher_id' => $request->teacher_id,
            ];
            $result = StudentLeave::query()->create($data);
        }
        if ($result) {
            return response()->json(['status' => true, 'Leave' => $data]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    // To retrieve student wise attendance
    public function studentWiseAttendance(Request $request)
    {
        $year = $request->get('year');
        $month = $request->get('month');
        $student = Student::query()
            ->where('studentId', $request->studentId)
            ->first();
        $studentAcademic = StudentAcademic::query()
            ->where('student_id', $student->id)
            ->with('classes', 'section', 'group')
            ->latest()
            ->first();
        $attendances = Attendance::query()
            ->where('student_academic_id', $studentAcademic->id)
            ->where('date','like','%'.$year.'-'.$month.'%')
            ->get();
        if ($attendances) {
            $data = [];
            foreach ($attendances as $attendance) {
                $data[] = [
                    'id' => $attendance->id,
                    'student_academic_id' => $attendance->student_academic_id,
                    'date' => date('d-m-Y', strtotime($attendance->date)),
                    'inTime' => $attendance->manual_in_time ?: $attendance->in_time,
                    'outTime' => $attendance->manual_out_time ?: $attendance->out_time,
                    'attnStatus' => $attendance->attendanceStatus->code ?? '',
                ];
            }

            return response()->json([
                'status' => true,
                'studentId' => $student->studentId,
                'studentName' => $student->name,
                'class' => $studentAcademic->classes->name ?? '',
                'section' => $studentAcademic->section->name ?? '',
                'group' => $studentAcademic->group->name ?? '',
                'attendances' => $data
            ]);
        }
    }

    // To retrieve Daily Attendance
    public function dailyAttendance(Student $student, Request $request)
    {
        $today = $request->get('date');
        $class = $request->get('class_id');

        $students = StudentAcademic::query()
            ->where('academic_class_id',$class)
            ->get();

        $attendArr = [];
        foreach ($students as $student) {
            $attn = Attendance::query()
                ->whereDate('date', $today)
                ->where('student_academic_id', $student->id)
                ->first();

            if ($attn != null) {
                $attendArr[] = (object)[
                    'studentName' => $student->student->name??'',
                    'studentId' => $student->student->studentId??'',
                    'date' => $today,
                    'class' => $student->classes->name??'',
                    'in_time' => $attn->manual_in_time ?? $attn->in_time,
                    'out_time' => $attn->manual_out_time ?? $attn->out_time,
                    'status' => $attn->attendanceStatus->code ?? '',
                ];
            }
        }

        $attendances = $attendArr ?? [];
        return response()->json([
            'status' => true,
            'attendances' => $attendances
        ]);
    }

    // To retrieve Exam Routine
    public function examRoutine(Request $request)
    {
        $routines = ExamSchedule::query()
            ->where('academic_class_id', $request->academic_class_id)
            ->where('exam_id', $request->exam_id)
            ->get()
            ->groupBy('date');
        $academic_class = AcademicClass::query()
            ->where('id',$request->academic_class_id)
            ->first();
        $r = [];
        foreach ($routines as $key => $routine) {
            $hours = [];
            foreach ($routine as $rou) {
                $hours[] = [
                    'name' => $rou->exam->name ?? '',
                    'start' => $rou->start ?? '',
                    'end' => $rou->end ?? '',
                    'subject' => $rou->subject->name ?? '',
                    'mark' => $rou->objective_full ?? 0 + $rou->written_full ?? 0 + $rou->practical_full ?? 0 ,
                    'isBreak' => false
                ];
            }
            $r[] = [
                'weekday' => $key,
                'hours' => $hours
            ];
        }
        return response()->json([
            'status' => true,
            'class' => $academic_class->classes->name ?? '',
            'Section' => $academic_class->section->name ?? '',
            'group' => $academic_class->group->name ?? '',
            'routine' => $r
        ]);
    }

    // To retrieve mobile attendance by student
    public function mobileAttendance(Student $student, Request $request)
    {
        $today = Carbon::now();
       // $today = '2023-02-11';
        $class = $request->get('class_id');
//        $s = $student->newQuery();
//        if ($request->get('class_id')) {
//            $class = $request->get('class_id');
//            $s->whereHas('studentAcademic', function ($query) use ($class) {
//                return $query->where('academic_class_id', $class);
//            });
//            $academicClass = AcademicClass::query()->findOrFail($request->get('class_id'));
//        } else {
//            $academicClass = '';
//        }

        //$students = $s->get();
        $students = StudentAcademic::query()->where('academic_class_id', $class)->get();
        $attendArr = [];
        foreach ($students as $student) {
            $attn = Attendance::query()
                ->where('student_academic_id', $student->id)
                ->whereDate('date', $today)
                ->first();
            // return $attn->attendanceStatus->code;
            $attendArr[] = (object)[
                'student_academic_id' =>  $student->id ?? '',
                'studentId' => $student->student->studentId ?? '',
                'studentName' => $student->student->name ?? '',
                'shift_id' => $student->shift_id ?? '',
                'attendance_status_id' => $attn != null ? $attn->attendance_status_id : 2,
                //'status' => $attn->attendanceStatus->code ?? ''
            ];

        }
        $attendances = $attendArr ?? [];
        return response()->json([
            'status' => true,
            'attendances' => $attendances
        ]);
    }

    // To retrieve all classes
    public function classes(){
        //$classes = Classes::query()->get();
        $classes = AcademicClass::query()->get();
        if ($classes->isNotEmpty()) {
            $data = [];
            foreach ($classes as $class) {
                //dd($class->section->name);
                $c = $class->classes->name??'';
                $s = $class->section->name??'';
                $g = $class->group->name??'';
                $data[] = [
                    'id' => $class->id,
                    'name' => $c.' '.$s.' '.$g,
                    'numericClass' => $class->classes->numeric_class ?? ' ',
                ];
            }
            return response()->json([
                'status' => true,
                'classes' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all sections
    public function sections(){
        $sections = Section::query()->get();
        if ($sections->isNotEmpty()) {
            $data = [];
            foreach ($sections as $section) {
                $data[] = [
                    'id' => $section->id,
                    'name' => $section->name
                ];
            }
            return response()->json([
                'status' => true,
                'sections' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all groups
    public function groups(){
        $groups = Group::query()->get();
        if ($groups->isNotEmpty()) {
            $data = [];
            foreach ($groups as $group) {
                $data[] = [
                    'id' => $group->id,
                    'name' => $group->name
                ];
            }
            return response()->json([
                'status' => true,
                'groups' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all groups
    public function subjects(){
        $subjects = Subject::query()->get();
        //$groups = Group::query()->get();
        if ($subjects->isNotEmpty()) {
            $data = [];
            foreach ($subjects as $subject) {
                $data[] = [
                    'id' => $subject->id,
                    'name' => $subject->name
                ];
            }
            return response()->json([
                'status' => true,
                'subjects' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    // To retrieve all examinations
    public function examinations(){
        $exams = Exam::whereHas('session', function($q){
            return $q->where('active', 1);
        })->get();

        if ($exams->isNotEmpty()) {
            $data = [];
            foreach ($exams as $exam) {
                $data[] = [
                    'id' => $exam->id,
                    'name' => $exam->name,
                    'session' => $exam->session->year ?? '',
                    'start' => $exam->start ?? '',
                    'end' => $exam->end ?? ''
                ];
            }
            return response()->json([
                'status' => true,
                'exams' => $data
            ]);
        } else {
            return response(null, 204);
        }
    }

    /**
     * Store students attendance data in database
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function mobileAttendanceStore(Request $request): JsonResponse
    {
        $request->validate([
            'date' => 'required',
            'academic_class_id' => 'required',
            'attendances' => 'required'
        ]);
        $attendances = $request->attendances;
        foreach ($attendances as $attendance){
            $data['student_academic_id'] = $attendance['student_academic_id'];
            $data['date'] = $request->date;
            $data['shift_id'] = $attendance['shift_id'];
            $data['attendance_status_id'] = $attendance['attendance_status_id'] ? 1 : 2;
            $isExists = Attendance::query()
                ->where('date',$request->date)
                ->where('student_academic_id',$attendance['student_academic_id'])
                ->exists();
            if($isExists){
                $attn = Attendance::query()
                    ->where('date',$request->date)
                    ->where('student_academic_id',$attendance['student_academic_id'])
                    ->first();
                try {
                    $attn->update(['attendance_status_id'=>$data['attendance_status_id']]);
                }catch (Exception $e){
                    return response()->json($e->getMessage());
                }
            }else{
                try {
                    Attendance::query()->create($data);
                }catch (Exception $e){
                    return response()->json($e->getMessage());
                }
            }
        }
        return response()->json(['status' => true]);
    }

    /**
     * To retrieve exam result of student
     *
     * @param Request $request
     * @return JsonResponse
    */
    public function examResult(Request $request): JsonResponse
    {

            $classId=$request->class_id;
            $examResult = ExamResult::query()
                ->whereHas('studentAcademic', function($q) use($classId){
                    $q->where('academic_class_id', $classId);
                })
                ->orWhere('exam_id',$request->exam_id)
                ->orWhere('student_academic_id', $request->student_academic_id)
                ->with('exam', 'studentAcademic')
                ->get();

        if ($examResult) {
            $data = [];
            foreach ($examResult as $result) {
                $TotalNumbers = DB::table('exam_schedules')
                    ->where('exam_id', $result->exam_id)
                    ->where('academic_class_id', $result->studentAcademic->academic_class_id)
                    ->selectRaw('SUM(objective_full) as obj, SUM(written_full) as wri, 
                                SUM(practical_full) as pra, SUM(viva_full) as viva')
                    ->first();

                $obj_full = $TotalNumbers->obj ?? 0;
                $written_full = $TotalNumbers->wri ?? 0;
                $practical_full = $TotalNumbers->pra ?? 0;
                $viva_full = $TotalNumbers->viva ?? 0;
                $total = $obj_full + $written_full + $practical_full + $viva_full;

                $data[] = [
                    'id' => $result->id,
                    'studentAcademicId' => $result->student_academic_id,
                    'title' => $result->exam->name ?? '',
                    'isPassed' => $result->grade == 'F' ? false : true,
                    'result' => [
                        [
                            'label' => 'GPA',
                            'obtained' => $result->gpa,
                            'total' => '5.00',
                        ], [
                            'label' => 'TOTAL',
                            'obtained' => $result->total_mark,
                            'total' => strval($total),
                        ], [
                            'label' => 'ATTENDANCE',
                            'obtained' => '35',
                            'total' => '98',
                        ],

                    ]
                ];
            }
            return response()->json([
                'status' => true,
                'results' => $data
            ]);
        } 
        else {
            return response(null, 204);
        }
    }

    // To retreive a student's information through search
    
    public function studentInfo(Request $request)
    {
        $studentId = $request->get('student_id');
        $student = Student::query()->where('studentId',$studentId)->first();
        if ($student) {
            return response()->json([
                'status' => true,
                'studentInfo' => 
                    [
                        'id' => $student->id,
                        'name' => $student->name ?? '',
                        'studentId' => $student->studentId ?? '',
                        'Department' => $student->studentAcademic->group->name ?? '',
                        'mobile' => $student->mobile ?? '',
                        'gender' => $student->gender->name ?? ''
                    ],
            ]);
        } 
        else {
            return response(null, 204);
        }
    }

    
}
