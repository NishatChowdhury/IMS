<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Holiday;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::query()->paginate(25);
        return view('admin.attendance.holiday',compact('holidays'));
    }

    public function store(Request $request)
    {
//        return $request->all();
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'sometimes|nullable|date'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $holiday = Holiday::query()->create($request->all());


        return redirect('admin/holidays')->with(['status' => 'Holiday has been added successfully!']);
    }

    public function edit($id)
    {
        $holiday = Holiday::query()->findOrFail($id);
        $holidays = Holiday::query()->paginate(25);
        return view('admin.attendance.holiday-edit',compact('holiday','holidays'));
    }

    public function update($id, Request $request)
    {
        $holiday = Holiday::query()->findOrFail($id);

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'start' => 'required|date',
            'end' => 'sometimes|nullable|date|after_or_equal:start'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }


        $holiday->update($request->all());


        return redirect('admin/holidays')->with(['status' => 'Holiday has been updated!']);
    }

    public function destroy($id)
    {
        $holiday = Holiday::query()->findOrFail($id);
        $holiday->delete();
        Session::flash('success',$holiday->name.' is deleted successfully!');
        return redirect('admin/holidays')->with(['status' => 'Event has been Deleted successfully!']);
    }
}
