<?php

namespace App\Http\Controllers;

use App\LeavePurpose;
use App\Student;
use App\StudentLeave;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;
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
        $student = Student::query()->where('studentId',$request->student_id)->latest()->first();
        $request['student_id'] = $student->id;
        StudentLeave::query()->create($request->all());
        Session::flash('success','Leave has been entered!');
        return redirect('attendance/leaveManagement');
    }


    public function destroy($id)
    {
        //
    }
}
