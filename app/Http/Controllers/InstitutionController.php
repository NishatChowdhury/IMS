<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    public function academicyear()
    {
        return view ('admin.institution.academicyear');
    }

    public function classes()
    {
        return view ('admin.institution.classes');
    }

    public function classsubjects()
    {
        return view ('admin.institution.classsubjects');
    }

    public function subjects()
    {
        return view ('admin.institution.subjects');
    }

    public function section()
    {
        return view ('admin.institution.section');
    }

    public function profile()
    {
        return view ('admin.institution.profile');
    }
}
