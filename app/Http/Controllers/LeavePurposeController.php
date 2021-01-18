<?php

namespace App\Http\Controllers;

use App\leavePurpose;
use Illuminate\Http\Request;

class LeavePurposeController extends Controller
{

    public function index()
    {
        return view('admin.leavePurpose.add-purpose');
    }



    public function store(Request $request)
    {
        leavePurpose::query()->create($request->all());
        return redirect('attendance/leavePurpose');
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
