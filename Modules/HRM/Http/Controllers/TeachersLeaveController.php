<?php

namespace Modules\HRM\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\AttendanceTeacher;
use App\Models\Backend\LeavePurpose;
use App\Models\Backend\Staff;
use Carbon\CarbonPeriod;
use App\Models\Backend\TeachersLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class TeachersLeaveController extends Controller
{

    public function index()
    {
        $leaves = TeachersLeave::all()->groupBy('leaveId');
        return view('hrm::TeacherLeaveManagement.view-leave',compact('leaves'));
    }


    public function create()
    {
        $teachers = Staff::all()->pluck('name','id');
        $leave_purpose = LeavePurpose::all()->pluck('leave_purpose','id');
        return view('hrm::TeacherLeaveManagement.add-leave',compact('leave_purpose','teachers'));
    }


    public function store(Request $request)
    {

        $start = $request->get('start_date');
        $end = $request->get('end_date');

        if(!$end){
            $end = $start;
        }

        $period = CarbonPeriod::create($start,$end);

        $rnd = rand(10,99);

        foreach ($period as $date) {
            $d = $date->format('Y-m-d');
            $data = [
                'leaveId' => date('ymd').$request->get('teacher_id').$rnd,
                'date' => $d,
                'leave_purpose_id' => $request->get('leave_purpose_id'),
                'teacher_id' => $request->get('teacher_id')
            ];

            $attn = AttendanceTeacher::query()->where('date',$date)->where('staff_id',$request->get('teacher_id'))->first();
            if($attn){
                $attn->update(['attendance_status_id'=>7]);
            }else{
                AttendanceTeacher::query()->create([
                    'staff_id' => $request->get('teacher_id'),
                    'date' => $date,
                    'shift_id' => 1,
                    'attendance_status_id' => 7,
                ]);
            }

            TeachersLeave::query()->create($data);
        }

        Session::flash('success','Leave has been entered!');
        return redirect('admin/attendance/TeacherLeaveManagement');
    }

    public function edit($id)
    {
        TeachersLeave::where('leaveId',$id)->delete();
        return back();
    }

}
