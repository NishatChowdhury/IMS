<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\Group;
use App\Section;
use App\Session;
use App\SessionClass;
use App\Subject;
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
        Session::query()->create($request->all());
        return redirect('institution/academicyear')->with('success', 'Academic year added successfully');
    }

    public function edit_session(Request $request){
        $session = Session::query()->findOrFail($request->session_id);
        return $session;
    }

    public function update_session(Request $request){
        $session = Session::query()->findOrFail($request->session_id);
        $session->update($request->all());
        return redirect('institution/academicyear')->with('success', 'Academic year Updated');
    }

    public function delete_session($id){
         $session = Session::query()->findOrFail($id);
         $session->delete();
         return redirect('institution/academicyear')->with('success', 'Academic Year Deleted Successfully');
    }

    public function section_group()
    {
        $sections = Section::all();
        $groups = Group::all();
        return view ('admin.institution.section-group', compact('sections', 'groups'));
    }

    public function create_section(Request $req){
        Section::query()->create($req->all());
        return redirect('institution/section-groups')->with('success', 'Section added successfully');
    }

    public function edit_section(Request $req){
        $section = Section::query()->findorFail($req->id);
        return $section;
    }

    public function update_section(Request $req){
        $section = Section::query()->findOrFail($req->id);
        $section->update(['name' => $req->section_name]);
        return redirect('institution/section-groups')->with('success', 'Section has been Updated');
    }

    public function delete_section($id){
        $section= Section::query()->findOrFail($id);
        $section->delete();
        return redirect('institution/section-groups')->with('success', 'Section deleted successfully');
    }

    public function create_group(Request $req){
        Group::query()->create($req->all());
        return redirect('institution/section-groups')->with('success', 'Group added successfully');
    }

    public function edit_group(Request $req){
        $data = Group::query()->findorFail($req->id);
        return $data;
    }

    public function update_group(Request $req){
        $data = Group::query()->findOrFail($req->group_id);
        $info = ['name' => $req->group_name];
        $data->update($info);
        return redirect('institution/section-groups')->with('success', 'Group has been Updated');
    }

    public function delete_grp($id){
        $group= Group::query()->findOrFail($id)->first();
        $group->delete();
        return redirect('institution/section-groups')->with('success', 'Group deleted successfully');
    }
    /*Institute >> Section-Groups End*/


    public function classes()
    {
        $sessions = Session::all();
        $classes = AcademicClass::all();

        return view ('admin.institution.classes', compact('sessions','classes'));
    }

    public function store_class(Request $req){
        //dd($req->all());
            $add_class = [
                'session_id' => $req->session_id,
                'academic_class_id' => $req->academic_class_id,
                'code' => $req->code,
                'group_id' => $req->group_id or null,
                'section' => $req->section,
                'tuition_fee' => $req->tuition_fee,
                'admission_fee' => $req->admission_fee,
                'admission_form_fee' => $req->admission_form_fee
            ];
        SessionClass::create($add_class);

        $thisClass_id = SessionClass::query()->orderBy('id', 'desc')->first()->id;

        $data = [
            'section_name' => $req->section,
            'session_id' => $req->session_id,
            'class_id' => $thisClass_id,
            'group_id' => $req->group_id or null,
        ];
        Section::create($data);
        return redirect('institution/class');
    }

    public function edit_SessionClass(Request $req){
        $class = SessionClass::findOrFail($req->id);
        return $class;
    }

    public function update_SessionClass(Request $req){
        $class = SessionClass::findOrFail($req->id);
        $class->update($req->all());
        return redirect(route('institution.classes'))->with('success', 'Class has been Updated');
    }

    public function delete_SessionClass($id){
        $class = SessionClass::findOrFail($id);
        $class->delete();
        return redirect('institution/class')->with('success', 'Class has been Deleted');
    }

    /*Subjects Start*/
    public function subjects()
    {
        $subjects = Subject::all();
        return view ('admin.institution.subjects', compact('subjects'));
    }

    public function create_subject(Request $request){
        Subject::create($request->all());
        return redirect('institution/subject')->with('success', 'Subject Added Successfully');
    }

    public function edit_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        return $subject;
    }

    public function update_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        $subject->update($req->all());
        return redirect('institution/subject')->with('success', 'Class has been Updated');
    }

    public function delete_subject($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect('institution/subject')->with('success', 'Class has been Deleted');
    }
    /*Subjects End*/

    public function classsubjects()
    {
        return view ('admin.institution.classsubjects');
    }

    public function profile()
    {
        return view ('admin.institution.profile');
    }
}
