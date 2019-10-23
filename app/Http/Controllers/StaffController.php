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

    public function threshold()
    {
        return view ('admin.staff.threshold');
    }

    public function kpi()
    {
        return view ('admin.staff.kpi');
    }

    public function payslip()
    {
        return view ('admin.staff.payslip');
    }

}
