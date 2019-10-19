<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function teacher()
    {
        return view ('admin.staff.teacher');
    }

    public function addstaff()
    {
        return view ('admin.staff.addstaff');
    }
}
