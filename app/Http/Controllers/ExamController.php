<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function gradesystem()
    {
       return view ('admin.exam.gradesystem');
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
