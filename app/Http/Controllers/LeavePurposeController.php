<?php

namespace App\Http\Controllers;

use App\LeavePurpose;
use Illuminate\Http\Request;

class LeavePurposeController extends Controller
{

    public function index()
    {
        $leave_purposes = leavePurpose::all();
        return view('admin.leavePurpose.add-purpose',compact('leave_purposes'));
    }


    public function store(Request $request)
    {
        LeavePurpose::query()->create($request->all());
        return redirect('attendance/leavePurpose');
    }


    public function destroy($id)
    {
        $leave_purpose = leavePurpose::query()->findOrFail($id);
        $leave_purpose->delete();
        return redirect('attendance/leavePurpose');
    }
}
