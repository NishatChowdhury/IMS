<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\Attendance;
use App\Models\Backend\LeavePurpose;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentLeave;
use App\Models\TeacherLogin;
use App\Repository\AttendanceRepository;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Staff;
use App\Models\Backend\Subject;
use App\Models\Diary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MainController extends Controller
{
    public $repository;

    public function __construct(AttendanceRepository $repository)
    {
         $this->middleware('teacher');
         $this->repository = $repository;


    }
    // Create Diary Start
    public function index(Request $request)
    {

         $diaries = Diary::query();
        $academicClass = AcademicClass::active()->get();
        if($request->get('date')){
            $diaries->where('date', $request->get('date'));
        }
        if($request->get('academic_class_id')){
            $diaries->where('academic_class_id', $request->get('academic_class_id'));
        }
        $diaries->where('teacher_id', auth()->guard('teacher')->user()->staff_id);
          $diaries = $diaries->orderBy('id', 'DESC')->get();
        return view('teacher.diary.index', compact('academicClass','diaries'));
    }
    public function create()
    {
        $teacher_id = auth()->guard('teacher')->user()->staff_id;
        $academicClass = AcademicClass::active()->get(); // active() means is show all active sessions
         $subjects = AssignSubject::query()
                                    ->where('teacher_id', $teacher_id)
                                    ->get();
        $teachers = Staff::where('staff_type_id', 2)->get();
        return view('teacher.diary.create', compact('academicClass','subjects','teachers'));
    }

    public function store(Request $request)
    {
            $validated = $request->validate([
                'date' => 'required',
                'teacher_id' => 'required',
                'subject_id' => 'required',
                'description' => 'required',
            ]);

            $assignSubject = AssignSubject::find($request->subject_id);
            Diary::create([
                'academic_class_id' => $assignSubject->academic_class_id,
                'date' => $request->date,
                'teacher_id' => $request->teacher_id,
                'subject_id' => $assignSubject->subject_id,
                'description' => $request->description,
            ]);
            return back()->with('status', 'Your Diary Create Successfully');
    }
    public function update(Request $request, $id)
    {
            $validated = $request->validate([
                'date' => 'required',
                'teacher_id' => 'required',
                'subject_id' => 'required',
                'description' => 'required',
            ]);

            $assignSubject = AssignSubject::find($request->subject_id);
            $diary = Diary::find($id);
            $diary->update([
                'academic_class_id' => $assignSubject->academic_class_id,
                'date' => $request->date,
                'teacher_id' => $request->teacher_id,
                'subject_id' => $assignSubject->subject_id,
                'description' => $request->description,
            ]);

            return redirect()->route('teacher.diary.index')->with('status', 'Your Diary Create Successfully');
    }

    public function edit($id)
    {
        $diary = Diary::find($id);
        return redirect()->route('teacher.diary.create')->with(['data' => $diary]);
    }

    // attendanceView

    public function attendanceView(Request $request)
    {

        $repository = $this->repository;
        if($request->user == 1){

            $today = $request->get('date');
        $s = Student::query();

        if($request->get('studentId')){
            $studentId = $request->get('studentId');
            $s->where('studentId',$studentId);
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
        }

        $attendances = $attendArr ?? [];

        return view('teacher.attendance.day-wise', compact('attendances','repository','today'));

        }elseif ($request->user == 2){
            $data = [];
            $data['year'] = $request->year;
            $data['month'] = $request->month;
            $data['class_id'] = $request->class_id;

            if($request->has('class_id') && $request->has('year') && $request->has('month')){
                $request->class_id;
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

            return view('teacher.attendance.monthly-wise', compact('repository','year','month','students','personStatus'));
        }
        $repository = $this->repository;
        return view('teacher.attendance.index', compact('repository'));
    }


    /// leave Start
    public function leaveStudent()
    {
                $allData = StudentLeave::all()->groupBy('leaveId');
                return view('teacher.leave.index',compact('allData'));
    }

     public function leaveAdd()
        {
            $leave_purpose = LeavePurpose::all()->pluck('leave_purpose','id');
            return view('teacher.leave.create',compact('leave_purpose'));
        }
    public function leaveStore(Request $request)
    {

         $student = Student::query()->where('studentId',$request->student_id)->latest()->first();

        if(!$student){
            return redirect()->back();
        }

        $start = $request->get('start_date');
        $end = $request->get('end_date');

        if(!$end){
            $end = $start;
        }

         $period = CarbonPeriod::create($start,$end);

        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            $data = [
                'leaveId' => date('ymd').$student->id,
                'student_id' => $student->id,
                'teacher_id' => auth()->guard('teacher')->user()->staff_id,
                'date' => $d,
                'leave_purpose_id' => $request->get('leave_purpose_id'),
            ];

            StudentLeave::query()->create($data);
        }

        Session::flash('success','Leave has been entered!');
        return redirect()->route('teacher.leave.student');

    }

    public function leaveDelete($id)
    {
        StudentLeave::where('leaveId',$id)->delete();
        return back();
    }
    
    
    // profile and passwoord chamge

    public function teacherProfile()
    {
         $user = Auth::guard('teacher')->user();
         $staff = Staff::where('card_id', $user->card_no)->first();
        return view('teacher.profile', compact('user','staff'));
    }

    public function teacherProfileUpdate(Request $request)
    {
        $staff = Staff::where('id', $request->id)->first();

        if($request->has('email')){
            $staff->update([
                'email' => $request->email,
                'name' => $request->name,
            ]);
        }

        $teacherLogin = TeacherLogin::where('staff_id', $staff->id)->first();
        $teacherLogin->update([
            'name' => $request->name,
        ]);
        return back()->with('status','Your profile was updated successfully');
    }
     public function resetPassword(Request $request)
    {
                $this->validate($request,[
                    'password' => 'required|confirmed'
                ]);
                    $staff = Staff::where('id', $request->id)->first();
                    if($request->password){

                        $teacherLogin = TeacherLogin::query()
                                            ->where('staff_id', $staff->id)
                                            ->first();
                        $teacherLogin->password = Hash::make($request->password);
                        $teacherLogin->save();

                        return redirect()->back()->with('status', 'Your Password has been Change');

                    }
                    return redirect()->back()->with('status', 'NEw Password can not be same old password:)');
    }
}
