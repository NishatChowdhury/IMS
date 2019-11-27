<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function admissionExams()
    {
        return view('admin.admission.admission-exam');
    }

    public function admissionApplicant()
    {
        return view('admin.admission.applicant');
    }

    public function admissionExamResult()
    {
        return view('admin.admission.admission-exam-result');
    }
}
