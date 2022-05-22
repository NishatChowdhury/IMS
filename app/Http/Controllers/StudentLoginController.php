<?php

namespace App\Http\Controllers;

use App\Models\Backend\Attendance;
use App\Models\Backend\Exam;
use App\Models\Backend\ExamResult;
use App\Models\Backend\FeeSetupStudent;
use App\Models\Backend\Mark;
use App\Models\Backend\RawAttendance;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentPayment;
use App\Models\Diary;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Response;

class StudentLoginController extends Controller
{
//    public function showLoginForm()
//    {
//        return view('student.login');
//    }

    public function profile()
    {
        $id = auth()->guard('student')->user()->student_id;
        $student = Student::query()->with('academics')->findOrFail($id);

        $attendances = Attendance::query()
            ->where('registration_id',$student->studentId)
            ->where('date','like',now()->format('Y-m-').'%')
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
        $exam  = $this->exam($id);
        $result  = $this->result($id);
//        return $result;

        $inTime = $attendances->min('access_date');
        $outTime = $attendances->max('access_date');


        //$cal = cal_days_in_month(CAL_GREGORIAN,3,2020);
        $period = CarbonPeriod::create('2020-03-01', '2020-03-31')->toArray();

        return view('student.profile',compact('student','attendances','period','payments','due','exam','result'));
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
    public function exam($id){
        $student = Student::query()->findOrFail($id);
        $exam = ExamResult::query()->where('student_academic_id', $student->academics[0]->id)
            ->orderBy('id', 'DESC')
            ->get();
//        dd($exam);
        return $exam;
    }
    public function showDiary(){
        $id = auth()->guard('student')->user()->student_id;
        $student = StudentAcademic::query()->where('student_id',$id)->first();
        $diary = Diary::query()->with('subject')
                ->with('teacher')
                ->where('academic_class_id', $student->academic_class_id)
                ->get();
//        dd($diary);
//        return $diary;
        return view('student.diary',compact('diary'));
    }
    public function result($id){
//        dd($id);
        $student = StudentAcademic::query()->where('student_id',$id)->first();
        $marks = Mark::query()
            //->where('session_id',$request->get('session_id'))
            //->where('class_id',$request->get('class_id'))
            ->where('student_id',$id)
            ->with('subject')
            ->get();
        return $marks;
    }
    public function resultDetails(Request $request){
        $id = auth()->guard('student')->user()->student_id;
        $exam_id = $request->input('id');
        $exam_name =Exam::query()->where('id',$exam_id)->first();

        $student = StudentAcademic::query()->where('student_id',$id)->first();
        $resultDetails = Mark::query()
            ->where('student_id',$id)
            ->where('exam_id',$exam_id)
            ->with('subject')
            ->get();
        $html_data='';
        foreach ($resultDetails as $data){
            $html_data.='<tr data-toggle="modal" data-target="#exampleModal">'.
                                   '<td>'.$data->subject->name .'</td>'.
                                   '<td>'.$data->full_mark .'</td>'.
                                   '<td>'.$data->objective.'</td>'.
                                   '<td>'.$data->written.'</td>'.
                                   '<td>'.$data->practical.'</td>'.
                                   '<td>'.$data->total_mark.'</td>'.
                                   '<td>'.$data->gpa.'</td>'.
                                   '<td>'.$data->grade.'</td>'.
                               '</tr>';
        }
        return response()->json(['html'=>$html_data,'title'=>$exam_name->name]);
    }

}
