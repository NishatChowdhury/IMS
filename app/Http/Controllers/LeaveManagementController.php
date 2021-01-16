<?php

namespace App\Http\Controllers;

use App\LeavePurpose;
use App\Student;
use App\StudentLeave;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;

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
        $allData = StudentLeave::orderBy('id','desc')->get();
        return view('admin.leaveManagement.view-leave',compact('allData'));
    }


    public function add()
    {
        $leave_purpose = leavePurpose::pluck('leave_purpose');
        return view('admin.leaveManagement.add-leave',compact('leave_purpose'));
    }


    public function store(Request $request)
    {
        StudentLeave::query()->create($request->all());
        return redirect('attendance/leaveManagement');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
