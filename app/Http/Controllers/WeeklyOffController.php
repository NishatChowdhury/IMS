<?php

namespace App\Http\Controllers;

use App\Session;
use App\weeklyOff;
use Illuminate\Http\Request;

class WeeklyOffController extends Controller
{

    public function index()
    {
//        $weeklyOff = weeklyOff::pluck('show_option')->first();
        $weeklyOff = weeklyOff::pluck('show_option');
        $weeklyOffId = weeklyOff::pluck('id');
        $all = weeklyOff::all();

//        dd($all->id);

        return view('admin.attendance.weeklyOffSetting',compact('weeklyOff','weeklyOffId','all'));
    }


    public function store(Request $request)
    {
        $inputValue = $request->all();

        $request->validate([
            'show_option' =>'required'
        ]);

        $arrayTostring = implode(',', $request->input('show_option'));
        $inputValue['show_option'] = $arrayTostring;
        $success = weeklyOff::create($inputValue);
        return redirect()->back();

    }

    public function edit($item)
    {
        $finds = weeklyOff::find($item)->first();
        $offDay =explode(",",$finds->show_option);
        return view('admin.attendance.EditWeeklyOffSetting',compact('offDay'));
    }


    public function update(Request $request, $id)
    {
        $finds = weeklyOff::find($item)->first();
        $offDay =explode(",",$finds->show_option);
        return view('admin.attendance.EditWeeklyOffSetting',compact('offDay'));
    }


    public function destroy($id)
    {
        //
    }
}
