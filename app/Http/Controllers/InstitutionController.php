<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\Group;
use App\Section;
use App\Session;
use App\SessionClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstitutionController extends Controller
{
    public function academicyear()
    {
        $sessions = Session::all();
        return view ('admin.institution.academicyear', compact('sessions'));
    }

    public function store_session(Request $request){
        //dd($request->all());
        $validator = Validator::make($request->all(),[
            'session' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        /*if ($validator->passes()){
            $data = [
                'year' => $request->year,
                'start' => $request->start,
                'end' => $request->end,
                'description' => $request->description,
            ];

        }*/
        Session::create($request->all());
        return redirect('institution/academicyear')->with('success', 'Academic year added successfully');

    }


    public function edit_session(Request $request){
        $session = Session::find($request->session_id)->first();
        return $session;
    }
    public function update_session(Request $request){
        dd($request->all());
    }

    public function delete_session($id){
         $session = Session::find($id)->first();
         $session->delete();
         return redirect('institution/academicyear')->with('success', 'Academic Year Deleted Successfully');
    }
    public function classes()
    {
        $sessions = Session::all();
        $academic_classes = AcademicClass::all();
        $groups = Group::all();
        $classes = SessionClass::query()->first();

        return view ('admin.institution.classes', compact('sessions','academic_classes', 'classes', 'groups'));
    }

    public function store_class(Request $req){
        //dd($req->all());
            $add_class = [
                'session_id' => $req->session_id,
                'academic_class_id' => $req->academic_class_id,
                'code' => $req->code,
                'group_id' => $req->group_id or null,
                'section_name' => $req->section_name,
                'tuition_fee' => $req->tuition_fee,
                'admission_fee' => $req->admission_fee,
                'admission_form_fee' => $req->admission_form_fee
        ];
        SessionClass::create($add_class);

        $thisClass_id = SessionClass::query()->first()->id;
        $data = [
            'section_name' => $req->section_name,
            'session_id' => $req->session_id,
            'class_id' => $thisClass_id,
            'group_id' => $req->group_id or null,
        ];
        Section::create($data);
        return redirect('institution/class');
    }
    public function classsubjects()
    {
        return view ('admin.institution.classsubjects');
    }

    public function subjects()
    {
        return view ('admin.institution.subjects');
    }

    public function class_group()
    {
        $classes = AcademicClass::all();
        $groups = Group::all();
        return view ('admin.institution.class-group', compact('classes', 'groups'));
    }

    public function create_class(Request $req){
        AcademicClass::create($req->all());
        return redirect('institution/class&groups')->with('success', 'Class added successfully');
    }

    public function delete_class($id){
        $class= AcademicClass::findOrFail($id)->first();
        $class->delete();
        return redirect('institution/class&groups')->with('success', 'Group deleted successfully');
    }

    public function create_group(Request $req){
        Group::create($req->all());
        return redirect('institution/class&groups')->with('success', 'Group added successfully');
    }

    public function delete_grp($id){
        $group= Group::findOrFail($id)->first();
        $group->delete();
        return redirect('institution/class&groups')->with('success', 'Group deleted successfully');
    }

    public function profile()
    {
        return view ('admin.institution.profile');
    }
}
