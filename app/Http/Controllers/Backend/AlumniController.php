<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Alumni;

class AlumniController extends Controller
{
    public function index()
    {
        $alumnis = Alumni::query()->get();
        return view('admin.alumni.index',compact('alumnis'));
    }
}
