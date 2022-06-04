<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShiftController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $shifts = Shift::all();
        return view('admin.attendance.setting',compact('shifts'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        $this->validate($request,[
            'name' => 'required',
            'start' => 'required',
            'end' => 'required',
            'grace' => 'required',
            'late_fee' => 'required',
            'absent_fee' => 'required',
        ]);
        Shift::query()->create($request->all());
        Session::flash('success','Shift add successfully');
        return redirect('admin/attendance/setting');
    }

    public function edit($id)
    {
        $shift = Shift::find($id);
        return view('admin.attendance.setting-edit',compact('shift'));
    }
    public function update(Request $request)
    {
        $shift = Shift::find($request->id)->update($request->all());
        return redirect('admin/attendance/setting')->with(['status' => 'Attendance Setting Edit Successfully']);
    }

    public function destroy($id)
    {
        $shift = Shift::query()->findOrFail($id);
        $shift->delete();
        Session::flash('success','Shift deleted successfully!');
        return redirect()->back();
    }
}
