<?php

namespace App\Http\Controllers\Flutter;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Attendance;
use App\Models\Backend\Classes;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\Group;
use App\Models\Backend\Section;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentLeave;
use App\Models\Diary;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
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

    public function studentWiseAttendance(Request $request)
    {
        $student = Student::query()
            ->where('studentId', $request->studentId)
            ->first();
        $studentAcademic = StudentAcademic::query()
            ->where('id', $student->id)
            ->with('classes', 'section', 'group')
            ->first();
        $attendances = Attendance::query()
            ->where('student_academic_id', $studentAcademic->id ?? '')
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
                    'status' => $attendance->attendanceStatus->code ?? '',
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

    public function dailyAttendance(Student $student, Request $request)
    {
        $today = $request->get('date');
        $s = $student->newQuery();
        if ($request->get('class_id')) {
            $class = $request->get('class_id');
            $s->whereHas('studentAcademic', function ($query) use ($class) {
                return $query->where('academic_class_id', $class);
            });
            $academicClass = AcademicClass::query()->findOrFail($request->get('class_id'));
        } else {
            $academicClass = '';
        }

        $students = $s->get();
        $attend = [];
        foreach ($students as $student) {
            $stuAca = StudentAcademic::where('student_id', $student->id)->first();
            $attn = Attendance::query()
                ->whereDate('date', $today)
                ->where('student_academic_id', $stuAca->id)
                ->first();
            if ($attn != null) {
                $attendArr[] = (object)[
                    'studentName' => $student->name,
                    'studentId' => $student->studentId,
                    'date' => $today,
                    'class' => $stuAca->classes->name,
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

    public function mobileAttendance(Student $student, Request $request)
    {
        $s = $student->newQuery();
        if ($request->get('class_id')) {
            $class = $request->get('class_id');
            $s->whereHas('studentAcademic', function ($query) use ($class) {
                return $query->where('academic_class_id', $class);
            });
            $academicClass = AcademicClass::query()->findOrFail($request->get('class_id'));
        } else {
            $academicClass = '';
        }

        $students = $s->get();
        foreach ($students as $student) {
            $stuAca = StudentAcademic::where('student_id', $student->id)->first();
            $attn = Attendance::query()
                ->where('student_academic_id', $stuAca->id)
                ->first();
            if ($attn != null) {
                $attendArr[] = (object)[
                    'studentId' => $student->studentId,
                    'studentName' => $student->name,
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
}
