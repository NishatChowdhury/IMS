<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Grade;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function gradesystem()
    {
        $gradings = Grade::all();
       return view ('admin.exam.gradesystem', compact('gradings'));
    }

    public function store_grade(Request $request){
        //dd($request->all());
        Grade::query()->create($request->all());
        return redirect('exam/gradesystem')->with('success', 'Grading System Added Successfully');
    }

    public function delete_grade($id){
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect('exam/gradesystem')->with('success', 'Grading System Deleted Successfully');
    }

    public function examination()
    {
        return view ('admin.exam.examination');
    }

    public function examitems()
    {
        return view ('admin.exam.examitems');
    }

}
