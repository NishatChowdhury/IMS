<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\Attendance;
use App\Staff;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        return view('admin.attendance.attendance');
    }

    public function dashboard()
    {
        //month Calculation start
        $month_name = date('F');
        //month Calculation end

//      total Students present attendance count start
        $today_date = date('Y-m-d');
        $students = Student::query()->get('studentId');
        $total_attendance = $i = 0;
            foreach ($students as $student){
                $total_attendances[$i] = Attendance::query()->where('access_date', 'like','%'.$today_date.'%')->where('registration_id', $student->studentId)->first();
                    if($total_attendances[$i] != null){
                        $total_attendance++;
                    }
                    $i++;
            }
//      total  Students present attendance count end

//      total Students absent count start
        $total_student = count($students);
        $total_absents = $total_student - $total_attendance;
//      total Students absent count end

//      Total Teacher Present Attendance Count Start
        $teachers = Staff::query()->whereNotNull('role_id')->get('role_id');
        $total_attendance_teacher = $n =0;
            foreach ($teachers as $teacher){
                $total_attendance_teachers[$n] = Attendance::query()->where('access_date','like','%'.$today_date.'%')->where('registration_id', $teacher->card_id)->first();
                if($total_attendance_teachers[$n] != null){
                    $total_attendance_teacher++;
                }
                $i++;
            }
        $total_teacher = count($teachers);
        $total_absents_teacher = $total_teacher - $total_attendance_teacher;
//      Total Teacher Present Attendance Count End

//        Class wish attendance list start

        $class_attendances = DB::select("SELECT COUNT(*) AS totalScan, exam_class_id,c.name FROM students,exam_classes as c WHERE students.exam_class_id=c.id AND card_id in (SELECT DISTINCT registration_id FROM attendances WHERE access_date LIKE '".$today_date."%') GROUP BY students.exam_class_id");


//        Class wish attendance list end

        return view('admin.attendance.dashboard',compact('month_name','today_date','total_attendance','total_absents','total_student','total_attendance_teacher','total_absents_teacher','total_teacher','academicClasses','class_attendances'));
    }

    public function getAttendanceMonthly(Request $request){
        //dd($request->all());
        $students = Student::query()->where('class_id', $request->academicClass)->orderBy('rank')->get();
        $date = $request->year.'-'.$request->month;
        $month = $request->month;
        $year = $request->year;
        $attn = [];
        //dd($date);
        //dd($students);
        foreach($students as $student){
            $attn[] = Attendance::query()->where('registration_id',$student->studentId)->where('access_date','like',$date.'%')->get();
        }
        //dd($attn);

        $teachers = Staff::query()->where('staff_type_id','teacher')->get();

        $attn_teacher =[];
        foreach ($teachers as $teacher){
            $attn_teacher[] = Attendance::query()->where('registration_id', $teacher->role_id)->where('access_date','like',$date.'%')->get();
        }
        if ($request->user == 2){
            return view('admin.attendance.month_row_teacher',compact('teachers','month','year'));
        }else{
            return view('admin.attendance.month_row',compact('students','month','year'));
        }

    }

    public function teacher()
    {
        $today_date = date('Y-m-d');
        $teachers = Staff::query()->get();
        $total_attendance_teacher = $n =0;
        foreach ($teachers as $teacher){
            $total_attendance_teachers[$n] = Attendance::query()->where('access_date','like','%'.$today_date.'%')->where('registration_id', $teacher->code)->first();
            if($total_attendance_teachers[$n] != null){
                $total_attendance_teacher++;
            }
            $n++;
        }
        $total_teacher = count($teachers);
        $total_absents_teacher = $total_teacher - $total_attendance_teacher;


        $teachers_data =DB::select(DB::raw("SELECT attendances.registration_id, staffs.role_id, attendances.access_date, staffs.name FROM attendances INNER JOIN staffs ON attendances.registration_id=staffs.role_id WHERE attendances.access_date like'".$today_date."%'"));

        $teacher_late_data = Attendance::query()->where('access_date','like','%'.$today_date.'%')->where('access_date', '<' ,$today_date.' 09:00:00')->get();

        return view('admin.attendance.teacher', compact('today_date','teachers_data','total_attendance_teacher','total_absents_teacher','teachers'));
    }

    public function setting()
    {
        return view('admin.attendance.setting');
    }

    public function student()
    {
        $allStudents = Student::query()->get(['studentId','name']);
        $allClasses = AcademicClass::query()->get(['id', 'name']);
        return view('admin.attendance.student',compact('allStudents','allClasses'));
    }



    public function report(){

        $allClasses = AcademicClass::query()->get(['id','name']);

        return view('admin.attendance.report',compact('allClasses'));
    }

    public function individulAttendance(Request $request){
        $explode = explode(' - ',$request->dateRangeStudent);
        $start = $explode[0];
        $end = $explode[1];
        $student_id =$request->studentCardId;

        $std = Student::query()->where('studentId',$student_id)->first();
        if ($std){
            $attendances =Attendance::query()->where('registration_id',$student_id)->whereBetween('access_date',[$start,$end])->get()->groupBy(function($date) {
                return \Carbon\Carbon::parse($date->access_date)->format('Y-m-d');
            });
        }

        return view('admin.attendance.individualStudentAttendance',compact('std','attendances'));
    }

    public function individulTeacherAttendance(Request $request)
    {
        $explode = explode(' - ',$request->dateRangeTeacher);
        $start = $explode[0];
        $end = $explode[1];
        $teacherCardId = $request->teacherCardId;
        $teachers = Staff::query()->where('code', $teacherCardId)->first();
        if ($teachers){
            $attendances =Attendance::query()->where('registration_id',$teacherCardId)->whereBetween('access_date',[$start,$end])->get()->groupBy(function($date) {
                return \Carbon\Carbon::parse($date->access_date)->format('Y-m-d');
            });
        }

        return view('admin.attendance.individualTeacherAttendance',compact('teachers','attendances'));
    }
    public function classAttendance(Request $request){
        dd('Under Construction');
        $explode = explode(' - ',$request->dateRangeClass);
        $start = $explode[0];
        $end = $explode[1];
        $class_id = $request->academicClass;

        $students = Student::query()->where('class_id',$class_id)->get();

        foreach ($students as $student){
        $attendances[] =  $attendances =Attendance::query()->where('registration_id',$student->studentId)->whereBetween('access_date',[$start,$end])->get()->groupBy(function($date) {
            return \Carbon\Carbon::parse($date->access_date)->format('Y-m-d');
        });
        }
        dd($attendances);

    }



}
