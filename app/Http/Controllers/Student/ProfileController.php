<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Backend\Attendance;
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

        $attendances = Attendance::query()
            ->where('registration_id',$student->studentId)
            ->where('date' ,'like', now()->format('Y-m-').'%')
            ->orderBy('date')
            ->get();

        $stuAcademic =  StudentAcademic::query()
            ->where('student_id', $student->id)
            ->latest()
            ->first();

        $payments = StudentPayment::query()
            ->where('student_academic_id',$stuAcademic->id)
            ->orderBy('date', 'DESC')
            ->get();

        $due   = $this->due($id);
        $exam  = $this->exam($stuAcademic->id);
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
            'exam',
            'result'));
    }

    public function due($id)
    {
        $student = Student::query()->findOrFail($id);

        $paidAmount = StudentPayment::query()->where('student_academic_id', $student->academics[0]->id)
            ->selectRaw('year(date) as year, monthname(date) as month, sum(amount) as amount')
            ->groupBy('year', 'month')
            ->get();

        $fss = FeeSetupStudent::query()->where('student_id', $id)->get();
        $amount = 0;
        $paid = $paidAmount[0]->amount ?? 0;
        foreach ($fss as $fs) {
            $amount += $fs->amount;
        }

        return $amount - $paid;
    }

    public function exam($id)
    {
        return ExamResult::query()
            ->where('student_academic_id', $id)
            ->latest()
            ->get();
    }

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

        $resultDetails = Mark::query()
            ->where('student_id',$id)
            ->where('exam_id',$exam_id)
            ->with('subject')
            ->get();

        return view('student._result',compact('resultDetails'));
    }

    public function stdAttendance(Request $request){
        $id = auth()->guard('student')->user()->student_id;
        $student = Student::query()->with('academics')->findOrFail($id);
        $month_id = $request->input('month_id');
        if (strlen($month_id) == 1){
            $cng_month = '0'.$month_id;
        }else{
            $cng_month = $month_id;
        }
        $year_id = $request->input('year_id');
        $attendances = Attendance::query()
            ->where('registration_id',$student->studentId)
            ->where('date' ,'like', now()->format($year_id.'-'.$cng_month.'-').'%')
            ->orderBy('date')
            ->get();
        $html_attendance ='';
        if (Attendance::query()->where('date' ,'like', now()->format('%'.'-'.$cng_month.'-'.'%'))->where('date' ,'like', now()->format($year_id.'-'.'%'))->exists()){
            foreach ($attendances as $data){
                $html_attendance .=
                    '<tr>'.
                    '<th scope="row" class="text-dark font-weight-semiBold">'.$data->date->format('Y-m-d') .'</th>'.
                    '<td>'.$data->entry.'</td>'.
                    '<td>'.$data->exit.'</td>'.
                    '<td>'.'<a href="#" class="btn btn-link">'.$data->status.'</a>'.'</td>
        </tr>';
            }
        }else{
            $html_attendance .= '<tr><td colspan="4"><h1 class="text-center text-info">No record found</h1></td></tr>';
        }
        return response()->json(['html'=>$html_attendance]);
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
        $student = StudentAcademic::query()->where('student_id', $id)->first();
        $examRoutine = ExamSchedule::query()
            ->where('academic_class_id', $student->academic_class_id)
            ->with('subject')
            ->with('teacher')
            ->get();
//        foreach ($examRoutine as $exam){
//            if ($exam->ecademic_class_id==)
//        }
//        return response()->json(['html'=>$examRoutine]);
        $html_exam = '';
        foreach ($examRoutine as $data) {
            $html_exam .=
                '<tr>' .
                '<td>' . $data->subject->name . '</td>' .
                '<td>' . $data->date . '</td>' .
                '<td>' . $data->start . '</td>' .
                '<td>' . $data->end . '</td>' .
                '<td>' . $data->teacher->name. '</td>' .
                '</tr>';

        }
        return response()->json(['html'=>$html_exam]);
    }

    public function syllabus(){
        $id = auth()->guard('student')->user()->student_id;
        $student = StudentAcademic::query()->where('student_id', $id)->latest()->first();
        $syllabus = Syllabus::query()
            ->where('academic_class_id', $student->academic_class_id)
            ->first();
//        $syllabus = '';
//        foreach ($syllabuses as $data) {
//            $syllabus .=
//                '<tr>' .
//                '<td>' . $data->title . '</td>' .
//                '<td>' .
//
//                '<a href="/assets/syllabus/'.$data->file.'" class="btn btn-success btn-sm" target="_blank">View Syllabus <i class="fas fa-eye"></i></a>'.
//                '</td>'.
//                '</tr>';
//
//        }
//        return response()->json(['html'=>$syllabus]);
        return view('student._syllabus',compact('syllabus'));
    }
}


