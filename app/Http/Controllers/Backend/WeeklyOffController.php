<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\weeklyOff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WeeklyOffController extends Controller
{

    public function index()
    {
//
//        weeklyOff::truncate();
//        dd('deone');
        $all = weeklyOff::all();

        return view('admin.attendance.weeklyOffSetting',compact('all'));
    }


    public function store(Request $request)
    {
//      return  $inputValue = $request->all();

        $request->validate([
            'show_option' =>'required'
        ]);

//        $arrayToJson = json_encode($request->get('show_option'));
//        $inputValue['show_option'] = $arrayToJson;
        $success = weeklyOff::query()->create([
            'show_option' => $request->get('show_option')
        ]);
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
        $finds = weeklyOff::find($id);
       $finds->delete();

       return back();
    }
}
