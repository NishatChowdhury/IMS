<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student\Attendance;
use App\Models\Backend\Exam;
use App\Models\Backend\ExamResult;
use App\Models\Backend\ExamSchedule;
use App\Models\Backend\FeeSetupStudent;
use App\Models\Backend\Mark;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentPayment;
use App\Models\Backend\Syllabus;
use App\Models\ClassSchedule;
use App\Models\Diary;
use Carbon\CarbonPeriod;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    public function profile()
    {
        $id = auth()->guard('student')->user()->student_id;
        $student = Student::query()->with('academics')->findOrFail($id);

        $stuAcademic = StudentAcademic::query()
            ->where('student_id', $student->id)
            ->latest()
            ->first();

        $attendances = Attendance::query()
            ->where('student_academic_id',$stuAcademic->id)
            ->where('date' ,'like', now()->format('Y-m-').'%')
            ->orderBy('date')
            ->get();
        if ($attendances==NULL){
            return 'hello';
        }
        $payments = StudentPayment::query()
            ->where('student_academic_id',$stuAcademic->id)
            ->orderBy('date', 'DESC')
            ->get();

        $due   = $this->due($id);
        //$exam  = $this->exam($stuAcademic->id);
        $exams  = Exam::query()->where('session_id',1)->get();
        $result  = $this->result($id);
//        return $result;

        $inTime = $attendances->min('access_date');
        $outTime = $attendances->max('access_date');
        $present_month = Carbon::now()->month;
        $present_year = Carbon::now()->format('Y');
        //$cal = cal_days_in_month(CAL_GREGORIAN,3,2020);
        $period = CarbonPeriod::create('2020-03-01', '2020-03-31')->toArray();

        return view('student.profile',compact(
            'present_month',
            'present_year',
            'student',
            'attendances',
            'period',
            'payments',
            'due',
            'exams',
            'result'));
    }

    public function due($id)
    {
        $student = Student::query()->findOrFail($id);

//         $paidAmount = StudentPayment::query()->where('student_academic_id', $student->academics[0]->id)
//            ->selectRaw('year(date) as year, monthname(date) as month, sum(amount) as amount')
//            ->groupBy('year', 'month')
//            ->get();

        $paid = StudentPayment::query()
                                ->where('student_academic_id',$student->studentAcademic->id)
                                ->sum('amount');

        $fssDue = FeeSetupStudent::query()->where('student_id', $id)->sum('amount');

        if($fssDue > 0){
          return $totalDue =  $fssDue - $paid;
        }
//        return $totalDue;
//        return $amount - $paid;
    }

//    public function exam($id)
//    {
//        return ExamResult::query()
//            ->where('student_academic_id', $id)
//            ->latest()
//            ->get();
//    }

    /**
     * Display diary for a certain date of the current logged in student
     *
     * @param Request $request
     * @return View
     */
    public function diary(Request $request): View
    {
        $id = auth()->guard('student')->user()->student_id;
        $student = StudentAcademic::query()->where('student_id',$id)->latest()->first();

        $date = $request->has('date') ? $request->get('date') : today()->format('Y-m-d');

        $diaries = Diary::query()->with('subject')
            ->with('teacher')
            ->where('academic_class_id', $student->academic_class_id)
            ->where('date',$date)
            ->get();

        return view('student._diary',compact('diaries'));
    }

    public function result($id){
        return Mark::query()
            ->where('student_id',$id)
            ->with('subject')
            ->get();
    }

    public function marks(Request $request)
    {
        $id = auth()->guard('student')->user()->student_id;
        $exam_id = $request->input('id');

        $marks = Mark::query()
            ->where('student_id',$id)
            ->where('exam_id',$exam_id)
            ->with('subject')
            ->get();

        return view('student._result',compact('marks'));
    }

    public function stdAttendance(Request $request){
        $id = auth()->guard('student')->user()->student_id;
        $student = Student::query()->with('academics')->findOrFail($id);

        $stuAcademic =  StudentAcademic::query()
            ->where('student_id', $student->id)
            ->latest()
            ->first();

        $month_id = $request->input('month_id');
        if (strlen($month_id) == 1){
            $cng_month = '0'.$month_id;
        }else{
            $cng_month = $month_id;
        }

        $year_id = $request->input('year_id');
        $attendances = Attendance::query()
            ->where('student_academic_id',$stuAcademic->id)
            ->where('date' ,'like', now()->format($year_id.'-'.$cng_month.'-').'%')
            ->orderBy('date')
            ->get();

        return view('student._attendance',compact('attendances'));
    }

    public function classSchedule()
    {
        $id = auth()->guard('student')->user()->student_id;
        $student = StudentAcademic::query()
            ->where('student_id', $id)
            ->latest()
            ->first();

        $schedules = ClassSchedule::query()
            ->where('academic_class_id', $student->academic_class_id)
            ->with('subject')
            ->with('teacher')
            ->get()
            ->groupBy('day');

        return view('student._class-schedule',compact('schedules'));
    }

    public function examRoutine(){
        $id = auth()->guard('student')->user()->student_id;

        $student = StudentAcademic::query()->where('student_id', $id)->latest()->first();

        $routines = ExamSchedule::query()
            ->where('academic_class_id', $student->academic_class_id)
            ->with('subject')
            ->with('teacher')
            ->get()
            ->groupBy('exam_id');

        return view('student._exam-routine',compact('routines'));
    }

    public function syllabus(){
        $id = auth()->guard('student')->user()->student_id;
        $student = StudentAcademic::query()->where('student_id', $id)->latest()->first();
        $syllabus = Syllabus::query()
            ->where('academic_class_id', $student->academic_class_id)
            ->latest()
            ->first();

        return view('student._syllabus',compact('syllabus'));
    }
}


