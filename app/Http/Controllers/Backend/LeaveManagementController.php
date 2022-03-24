<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\LeavePurpose;
use App\Models\Backend\Student;
use App\Models\Backend\StudentLeave;
use App\Repository\StudentRepository;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
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
//        StudentLeave::query()->truncate();
         $allData = StudentLeave::all()->groupBy('leaveId');
        return view('admin.leaveManagement.view-leave',compact('allData'));
    }


    public function add()
    {
        $leave_purpose = LeavePurpose::all()->pluck('leave_purpose','id');
        return view('admin.leaveManagement.add-leave',compact('leave_purpose'));
    }


    public function store(Request $request)
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
                'date' => $d,
                'leave_purpose_id' => $request->get('leave_purpose_id'),
            ];

            StudentLeave::query()->create($data);
        }

        Session::flash('success','Leave has been entered!');
        return redirect('admin/attendance/leaveManagement');

    }


    public function edit($id)
    {
        StudentLeave::where('leaveId',$id)->delete();
        return back();
    }
    public function destroy($id)
    {
        //
    }
}
