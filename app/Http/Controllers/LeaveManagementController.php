<?php

namespace App\Http\Controllers;

use App\LeavePurpose;
use App\Student;
use App\StudentLeave;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LeaveManagementController extends Controller
{
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $allData = StudentLeave::all();
        return view('admin.leaveManagement.view-leave',compact('allData'));
    }


    public function add()
    {
        $leave_purpose = LeavePurpose::all()->pluck('leave_purpose','id');
        return view('admin.leaveManagement.add-leave',compact('leave_purpose'));
    }


    public function store(Request $request)
    {
        $student_id = $request->get('student_id');
        $start = $request->get('start_date');
        $end = $request->get('end_date');
        $leave_purpose_id = $request->get('leave_purpose_id');

        if(!$end){
            $end = $start;
        }

        $period = CarbonPeriod::create($start,$end);
//        dd($period);
//        $holiday = StudentLeave::query()->create($request->only('student_id'));

        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            DB::table('student_leaves')->insert(
                [
                    'student_id' => $student_id,
                    'date' => $d,
                    'start_date' => $start,
                    'end_date' => $end,
                    'leave_purpose_id' =>$leave_purpose_id
                ]
            );
        }

        Session::flash('success','Leave has been entered!');
        return redirect('attendance/leaveManagement');




//        $student = Student::query()->where('studentId',$request->student_id)->latest()->first();
//        $request['student_id'] = $student->id;
//        StudentLeave::query()->create($request->all());
//        Session::flash('success','Leave has been entered!');
//        return redirect('attendance/leaveManagement');
    }


    public function destroy($id)
    {
        //
    }
}
