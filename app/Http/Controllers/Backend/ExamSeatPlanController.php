<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\ExamSeatPlan;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;

class ExamSeatPlanController extends Controller
{
    protected $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function seatPlan($examId)
    {
        $id = $examId;
        $repository = $this->repository;
        $data = ExamSeatPlan::query()->orderBy('room')->get();
        return view('admin.exam.seatplan',compact('repository','id','data'));
    }

    public function storeSeatPlan(Request $request)
    {

        $this->validate($request,
            [
                'room'  => 'required',
                'count' => 'required',
            ]);

        ExamSeatPlan::query()->create($request->all());

        return redirect()->back();

    }

    public function pdfSeatPlan($id)
    {
        $seatData = ExamSeatPlan::query()->findOrFail($id);
        $students = StudentAcademic::query()
            ->where('academic_class_id',$seatData->academic_class_id)
            ->whereBetween('rank',[$seatData->roll_form, $seatData->roll_to])
            ->with('student')
            ->get();
//        $students = Student::query()
//                            ->where('academic_class_id',$seatData->academic_class_id)
//                            ->where('status',1)
//                            ->whereBetween('rank',[$seatData->roll_form, $seatData->roll_to])
//                            ->get();
        //dd($students);
        return view('admin.exam.pdf-seat-plan',compact('students','seatData'));
    }




    public function checkRoll(Request $request)
    {
        $id = $request->classId;
        $from = $request->rollFrom;
        $to = $request->rollTo;

        $academicData = AcademicClass::query()
            ->where('id', $id)
            ->with('studentAcademic',function($q)use($from,$to){
                $q->whereBetween('rank',[$from,$to]);
            })
            ->first();

        return $academicData->studentAcademic->count();

    }

    public function destroy($id)
    {
        $data = ExamSeatPlan::query()->findOrFail($id);
        $data->delete();
        return redirect()->back();
    }
}
