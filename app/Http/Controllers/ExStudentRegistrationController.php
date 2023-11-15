<?php

namespace App\Http\Controllers;

use App\Models\Backend\BloodGroup;
use App\Models\ExStudentRegistration;
use Illuminate\Http\Request;
use App\Slim\Slim;
use Illuminate\Support\Str;

class ExStudentRegistrationController extends Controller
{
    public function index(){
        $BloodGroups = BloodGroup::query()->get();
        $registration = ExStudentRegistration::query()->get();
        return view('front.ex_student_registration',compact('BloodGroups','registration'));
    }

    public function exStudents(){
        $exStudents = ExStudentRegistration::query()->get();
        return view('hrm::student.ex_students',compact('exStudents'));
    }

    public function view($id){
        $student = ExStudentRegistration::query()->findOrFail($id);
        return view('hrm::student.ex_student_profile',compact('student'));
    }

    public function store(Request $request){
        $save = $request->except('image');
        if($request->hasFile('image')){
            $image = $request->file('image');
            $random_time = md5(time());
            $fileformat = $image->getClientOriginalExtension();
            $randome_name =substr($random_time,5,12);
            $filename =$randome_name.".".$fileformat;
            $image->move(base_path("public/assets/img/exStudents"),$filename);
            $save["image"]=$filename;
        }
        ExStudentRegistration::create($save);
        session()->flash('success', 'User info has been Added!');
        return redirect(route('ex_student_registration.index'))->with('success','Student Saved Successfully');
    }

    public function edit($id){
        $student =  ExStudentRegistration::find($id);
        $BloodGroups = BloodGroup::query()->get();
        return view('hrm::student.edit_ex_student',compact('student','BloodGroups'));
    }

    public function update($id,Request $request)
    {
        $student= ExStudentRegistration::query()->findOrFail($id);
        $student->update($request->all());
        return redirect('admin/ex_students');
    }

    public function destroy($id)
    {
        $student = ExStudentRegistration::query()->findOrFail($id);
        $student->delete();
        session()->flash('success', 'Student removed successfully!');
        return redirect('admin/ex_students');
    }
}
