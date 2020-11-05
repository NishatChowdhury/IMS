<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('student.login');
    }

    public function profile()
    {
        $student = Student::query()->findOrFail(1);
        return view('student.profile',compact('student'));
    }
}
