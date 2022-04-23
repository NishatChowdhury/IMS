<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Backend\AppliedStudent;
use App\Models\Backend\OnlineApply;
use App\Models\Backend\Session;
use App\Repository\FrontRepository;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    private $repository;

    public function __construct(FrontRepository $repository)
    {
        $this->repository = $repository;
    }
    // public function validateAdmission()
    // {
    //     return view('front.admission.validate-admission');
    // }


    public function loadStudentId(Request $request){
        $academicYear = substr(trim(Session::query()->where('id',$request->academicYear)->first()->year),-2);

        $prefix = substr($request->get('groups'),0,1);

        $incrementId = AppliedStudent::query()->max('id');
        $increment = $incrementId + 1;

        $studentId = $prefix.$academicYear.$increment;
        return $studentId;
    }


    public function studentView(Request $request)
    {
        $roll = $request->get('roll');
        $student = AppliedStudent::query()->where('ssc_roll',$roll)->first();

        if(!$student){
            return response('<h3 class="text-danger text-center">Student not found in <b>Applied Student</b> database!</h3>');
            //abort(404,'Student not found in applied database!');
        }

        $subjects = json_decode($student->subjects);

        return view('admin.admission._student-view',compact('student','subjects'));
    }




    public function downloadSchoolPdf($id = null)
    {
//        return $id;

        $getData =  OnlineApply::where('password', $id)->first();
       if(empty($getData)){
            return back()->with('status', 'Your Application ID Not Match :)');
       }
        return view('front.admission-school.form-pdf', compact('getData'));
    }




    public function admissionSuccess(Request $request)
    {
        // return $request->all();
        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        return view('front.admission.admission-success',compact('student'));
    }
    public function admissionSuccessSchool()
    {
        return view('front.admission.admission-success-school');
    }
}
