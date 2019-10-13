<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('admin.student.list');
    }
    public function create(){
        return view('admin.student.add');
    }
}
