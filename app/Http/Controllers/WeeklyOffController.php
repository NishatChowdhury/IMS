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
