<?php

namespace App\Http\Controllers;

use App\weeklyOff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WeeklyOffController extends Controller
{

    public function index()
    {
        $weeklyOffs = json_decode(weeklyOff::query()->firstOrNew()->show_option);
        if(!$weeklyOffs) $weeklyOffs = []; // return empty array if no record in database
        return view('admin.attendance.weeklyOffSetting',compact('weeklyOffs'));
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

        $arrayToJson = json_encode($request->get('show_option'));
        $inputValue['show_option'] = $arrayToJson;
        $success = weeklyOff::query()->create($inputValue);
        if ($success){
            Session::flash('status', 'success');
        }
        else{
            Session::flash('error','something went wrong');
        }
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
