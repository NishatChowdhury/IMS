<?php

namespace App\Http\Controllers;

use App\Session;
use App\weeklyOff;
use Illuminate\Http\Request;

class WeeklyOffController extends Controller
{

    public function index()
    {
        return view('admin.attendance.weeklyOffSetting');
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
