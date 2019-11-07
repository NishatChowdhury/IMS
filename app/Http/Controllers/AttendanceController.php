<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\Attendance;
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
        $students = DB::table('students')->get('studentId');
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
        $teachers = DB::table('teacherinfo')->whereNotNull('card_id')->get('card_id');
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
        $academicClasses = AcademicClass::query()->get();

//        Class wish attendance list end

        return view('admin.attendance.dashboard',compact('month_name','today_date','total_attendance','total_absents','total_student','total_attendance_teacher','total_absents_teacher','total_teacher','academicClasses'));
    }

    public function getAttendanceMonthly(Request $request){
        //dd($request->all());
        $students = DB::table('students')->where('class_id', $request->class)->orderBy('rank')->get();
        $date = $request->year.'-'.$request->month;
        $month = $request->month;
        $year = $request->year;
        $attn = [];
        //dd($date);
        foreach($students as $student){
            $attn[] = DB::table('attendances')->where('registration_id',$student->studentId)->where('access_date','like',$date.'%')->get();
        }
        //dd($attn);

        $teachers = DB::table('teacherinfo')->where('type','teacher')->get();
        $attn_teacher =[];

        foreach ($teachers as $teacher){
            $attn_teacher = DB::table('attendances')->where('registration_id', $teacher->card_id)->where('access_date','like',$date.'%')->get();
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
        $teachers = DB::table('teacherinfo')->where('type','teacher')->get();
        $total_attendance_teacher = $n =0;
        foreach ($teachers as $teacher){
            $total_attendance_teachers[$n] = Attendance::query()->where('access_date','like','%'.$today_date.'%')->where('registration_id', $teacher->card_id)->first();
            if($total_attendance_teachers[$n] != null){
                $total_attendance_teacher++;
            }
            $n++;
        }
        $total_teacher = count($teachers);
        $total_absents_teacher = $total_teacher - $total_attendance_teacher;


        $teachers_data =DB::select(DB::raw("SELECT attendances.registration_id, teacherinfo.card_id, attendances.access_date, teacherinfo.name FROM attendances INNER JOIN teacherinfo ON attendances.registration_id=teacherinfo.card_id WHERE attendances.access_date like'".$today_date."%'"));

        $teacher_late_data = Attendance::query()->where('access_date','like','%'.$today_date.'%')->where('access_date', '<' ,$today_date.' 09:00:00')->get();

        return view('admin.attendance.teacher', compact('today_date', 'teachers', 'teachers_data','total_attendance_teacher','total_absents_teacher'));
    }

    public function setting()
    {
        return view('admin.attendance.setting');
    }

    public function student()
    {
        return view('admin.attendance.student');
    }



    public function report(){

        return view('admin.attendance.report');
    }



}
