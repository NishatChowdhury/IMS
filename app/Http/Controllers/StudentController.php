<?php

namespace App\Http\Controllers;

use App\Session;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('admin.student.list');
    }
    public function create(){
        $sessions = Session::all();

        return view('admin.student.add');
    }

    public function store(Request $req){
        //dd($req->all());
        if ($req->hasFile('file')){
            $image = $req->student_id.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/students/', $image);
            $data = $req->except('image');
            $data['image'] = $image;

            Student::create($data);
        }else{
            Student::create($req->all());
        }

        return redirect('stu_add')->with('success','Student Added Successfully');

    }
}
