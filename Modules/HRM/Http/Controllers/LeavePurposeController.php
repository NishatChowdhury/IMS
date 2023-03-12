<?php

namespace Modules\HRM\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\LeavePurpose;
use Illuminate\Http\Request;

class LeavePurposeController extends Controller
{

    public function index()
    {
        $leave_purposes = leavePurpose::all();
        return view('hrm::leavePurpose.add-purpose',compact('leave_purposes'));
    }


    public function store(Request $request)
    {

          $validated = $request->validate([
                'leave_purpose' => 'required|unique:leave_purposes|max:255',
            ]);
        LeavePurpose::query()->create($request->all());
        return redirect('admin/attendance/leavePurpose');
    }

    public function edit($id)
    {
        $leave_purposes = leavePurpose::all();
        $purpose=leavePurpose::query()->findOrFail($id);
        return view('hrm::leavePurpose.edit-purpose',compact('purpose','leave_purposes'));
    }

    public function update($id, Request $request)
    {
        $validated = $request->validate([
                'leave_purpose' => 'required|unique:leave_purposes,leave_purpose,'.$id,
            ]);
         $data=leavePurpose::query()->find($id);
        $data->update($request->all());
        return redirect('admin/attendance/leavePurpose')->with('success','Updated successfully');

    }


    public function destroy($id)
    {
        $leave_purpose = leavePurpose::query()->findOrFail($id);
        $leave_purpose->delete();
        return redirect('admin/attendance/leavePurpose');
    }
}
