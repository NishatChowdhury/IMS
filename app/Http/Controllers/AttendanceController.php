<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.attendance.attendance');
    }

    public function dashboard()
    {
        return view('admin.attendance.dashboard');
    }
}
