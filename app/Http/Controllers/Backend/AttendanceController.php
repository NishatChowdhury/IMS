<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Attendance;
use App\Models\Backend\AttendanceTeacher;
use App\Models\Backend\Classes;
use App\Models\Backend\HolidayDuration;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Session;
use App\Models\Backend\Shift;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentLeave;
use App\Models\Backend\weeklyOff;
use App\Repository\AttendanceRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * @var AttendanceRepository
     */
    private $repository;

    public function __construct(AttendanceRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function StuManuelAttendence(Request  $request){
        $academic_class = AcademicClass::query()->with(['classes:id,name', 'section:id,name', 'group:id,name'])->get();
        $date = $request->date ?? date('Y-m-d');
        $class = $request->academic_class;

//        $stuAttendence = Attendance::query()->with(['studentAcademic.student:id,name','studentAcademic']);
        $stuAttendence = Attendance::query()->with([
            'studentAcademic' => function ($query) {
                $query->select('id', 'student_id', 'class_id', 'section_id', 'group_id');
            },
            'studentAcademic.student' => function ($query) {
                $query->select('id', 'name', 'studentid');
            }
        ]);

        if ($class && $date) {

            $attendences = $stuAttendence->whereHas('studentAcademic', function ($q) use ($class) {
                $q->where('academic_class_id', $class);
            })->get();

        } else {
            $attendences = $stuAttendence->whereDate('date', $date)->get(['id','student_academic_id','date','attendance_status_id']);
        }
//        return  $attendences;
        return view('admin.attendance.manuel-attendence', compact('academic_class', 'attendences'));
    }

    public function StuManuelAttendenceStatus($id)
    {
       $attnStatus =  Attendance::query()->findOrFail($id);
       if ($attnStatus->attendance_status_id !== 1 ){
           $attnStatus->attendance_status_id = 1;
           $attnStatus->in_time = date('H:i:s');
       }else{
           $attnStatus->attendance_status_id = 2;
       }
        $attnStatus->save();
       return back();
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
            $total_attendances[$i] = RawAttendance::query()->where('access_date', 'like','%'.$today_date.'%')->where('registration_id', $student->studentId)->first();
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
            $total_attendance_teachers[$n] = RawAttendance::query()->where('access_date','like','%'.$today_date.'%')->where('registration_id', $teacher->card_id)->first();
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
//        $class_attendances = DB::select("SELECT COUNT(*) AS totalScan, class_id , c.name FROM students, academic_classes as c WHERE students.class_id=c.id AND studentId in (SELECT DISTINCT registration_id FROM attendances WHERE access_date LIKE '".$today_date."%') GROUP BY students.class_id");
        $class_attendances = [];

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

    public function teacher(Request $request)
    {
//        return AttendanceTeacher::all();
//        return $request->all();
        if($request->has('staff_id') && $request->has('year') && $request->has('month')){

            $year =$request->year;
            $m = $request->month;

            $date = Carbon::createFromFormat('m', $m);
            $month = $date->format('F');


            $staffs = Staff::query()
                ->where('id',$request->get('staff_id'))
                ->first();

             $attend = [];

        //            return strval($today);
//                    $stuAca = StudentAcademic::where('student_id',$student->id)->first();

                    $attn = AttendanceTeacher::query()
                                    ->whereYear('date', $request->year)
                                    ->whereMonth('date', $request->month)
                                    ->where('staff_id',$staffs->card_id)
                                    ->orderBy('date', 'DESC')
                                    ->get();


//                    if($attn != null) {
//                        $attendArr[] = (object)[
//                            'date' => $attn->date,
//                            'in_time' => $attn->manual_in_time ?? $attn->in_time,
//                            'out_time' => $attn->manual_out_time ?? $attn->out_time,
//                            'status' => $attn->attendanceStatus->name ?? '',
//                            'is_notified' => 'Is Notified'
//                        ];
//                    }
        //                array_push($attend, $attendArr);

                $repository = $this->repository;
                $attendances = $attn ?? [];

                $t = $staffs->name;
                $card = $staffs->card_id;

//                return $attendances;
        }else{
            $attend = [];
            $staffs = [];
            $attendances = [];
            $date = '';
            $t = '';
            $card = '';
            $year = '';
            $month = '';
        }
        $teachers =  Staff::query()
                            ->where('staff_type_id',2)
                            ->orderBy('card_id')
                            ->get()->pluck('name','id');
        return view('admin.attendance.teacher', compact('attend','t','card','staffs','year','month','attendances','teachers'));
    }



   public function student(Student $student, Request $request)
    {

        if($request->all() == []){
            $attendances = [];
            $repository = $this->repository;
            return view('admin.attendance.student',compact('attendances','repository'));
        }

        $today = $request->get('date');
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
//            $s->where('academic_class_id',$class);
            $s->whereHas('studentAcademic', function($query) use ($class){
                    return $query->where('academic_class_id', $class);
            });
            $academicClass = AcademicClass::query()->findOrFail($request->get('class_id'));
        }else{
            $academicClass = '';
        }

        $students = $s->get();



        $attend = [];
        foreach($students as $student){
//            return strval($today);
            $stuAca = StudentAcademic::where('student_id',$student->id)->first();
            $attn = Attendance::query()
                ->whereDate('date', $today)
                ->where('student_academic_id',$stuAca->id)
                ->first();


            if($attn != null) {
                $attendArr[] = (object)[
                    'student' => $student->name,
                    'card' => $student->studentId,
                    'rank' => $stuAca->rank,
                    'date' => $today,
                    'class' => $stuAca->classes->name,
                    'in_time' => $attn->manual_in_time ?? $attn->in_time,
                    'out_time' => $attn->manual_out_time ?? $attn->out_time,
                    'status' => $attn->attendanceStatus->name ?? '',
                    'is_notified' => 'Is Notified'
                ];
            }
//                array_push($attend, $attendArr);
        }
        $repository = $this->repository;
        $attendances = $attendArr ?? [];

        return view('admin.attendance.student',compact('attendances','repository','academicClass','today'));
    }

    public function report(Request $request){

        $allClasses = Classes::query()->get(['id','name']);
        $sessions = Session::query()->where('active',1)->get(['id','year']);

        if($request->get('user') == 3){
            $students = Staff::query()->where('staff_type_id', 2)->get();
            $month = $request->month;
            $year = $request->year;
            $date = Carbon::createFromDate($year,$month)->format('Y-m');
            $attn = [];
            $personStatus = 'Code';

        }elseif($request->get('user') == 1){
            if($request->has('class_id') && $request->has('year') && $request->has('month')){

                $students = StudentAcademic::query()
                    ->where('academic_class_id', $request->class_id)
                    ->orderBy('rank')
                    ->get();
                $month = $request->month;
                $year = $request->year;
                $date = Carbon::createFromDate($year,$month)->format('Y-m-d');
                $personStatus = 'Roll';

            }else{
                $students = [];
                $month = 0;
                $year = 0;
                $personStatus = 'Roll';
            }
        }else{
            $students = [];
            $month = 0;
            $year = 0;
            $personStatus = 'Roll';
        }


        $repository = $this->repository;

        return view('admin.attendance.report',compact('allClasses','repository','year','sessions','month','students','personStatus'));
    }


    public function individualAttendance(Request $request){
        $explode = explode(' - ',$request->dateRangeStudent);
        $start = $explode[0];
        $end = $explode[1];
        $student_id =$request->studentCardId;

        $std = Student::query()->where('studentId',$student_id)->first();
        if ($std){
            $attendances = Attendance::query()->where('registration_id',$student_id)->whereBetween('access_date',[$start,$end])->get()->groupBy(function($date) {
                return Carbon::parse($date->access_date)->format('Y-m-d');
            });
        }
        return view('admin.attendance.individualStudentAttendance',compact('std','attendances'));
    }

    public function individualTeacherAttendance(Request $request)
    {
        //dd($request->teacherCardId);
        $explode = explode(' - ',$request->dateRangeTeacher);
        $start = Carbon::parse($explode[0])->format('Y-m-d H:i:s');
        $end = Carbon::parse($explode[1])->format('Y-m-d H:i:s');
        $teacherCardId = $request->teacherCardId;
        $teachers = Staff::query()->where('card_id', $teacherCardId)->first();
        if ($teachers){
            $attendances = Attendance::query()->where('registration_id',$teacherCardId)->whereBetween('access_date',[$start,$end])->get()->groupBy(function($date) {
                return Carbon::parse($date->access_date)->format('Y-m-d H:i:s');
            });

        }

        return view('admin.attendance.individualTeacherAttendance',compact('teachers','attendances'));
    }

    public function classAttendance(Request $request){
        $explode = explode(' - ',$request->dateRangeClass);
        $start = $explode[0];
        $end = $explode[1];
        $class_id = $request->academicClass;
        $students = Student::query()->where('class_id', $class_id)->get();

        return view('admin.attendance.classAttendance',compact('students','start', 'end'));
    }

    public function status($studentId, $date, $enter = null, $exit = null)
    {
        if(!$enter && !$exit){
            $isHoliday = HolidayDuration::query()->whereDate('date',$date)->exists();
            $dayOfWeekIso = Carbon::parse($date)->dayOfWeekIso;
            $isWeeklyOff = weeklyOff::query()->where('show_option','like','%'.$dayOfWeekIso.'%')->exists();

            $inLeave = StudentLeave::query()
                ->where('student_id',$studentId)
                ->where('date',$date)
                ->exists();

            if($isWeeklyOff){
                $status = 'W';
            }elseif($isHoliday){
                $status = 'H';
            }elseif($inLeave){
                $status = 'L';
            }else{
                $status = 'A';
            }

        }else{
            $shiftInTime = Shift::query()->first()->start;
            $shiftOutTime = Shift::query()->first()->end;
            $grace = Shift::query()->first()->grace;

            $shiftInTime = Carbon::make($date.' '.$shiftInTime)->addMinutes($grace);
            $shiftOutTime = Carbon::make($date.' '.$shiftOutTime);

            $isLate = $enter > $shiftInTime;
            $isEarly = $exit < $shiftOutTime;

            if($isLate){
                $status = 'D';
            }elseif($isEarly){
                $status = 'E';
            }else{
                $status = 'P';
            }
        }

        return $status;
    }


}
