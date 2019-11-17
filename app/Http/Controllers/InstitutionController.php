<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AssignSubject;
use App\Group;
use App\Section;
use App\Session;
use App\SessionClass;
use App\Staff;
use App\Subject;
use App\SubjectAssign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstitutionController extends Controller
{
    public function academicyear()
    {
        $sessions = Session::all();
        return view ('admin.institution.academicyear', compact('sessions'));
    }
    public function academicyearstore(Request $request){
       return $request->all();

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
        $classes = AcademicClass::all();

        return view ('admin.institution.classes', compact('classes'));
    }

    public function store_class(Request $req){
        //dd($req->all());
        AcademicClass::query()->create($req->all());
        return redirect('institution/class');
    }

    public function edit_SessionClass(Request $req){
        $class = AcademicClass::findOrFail($req->id);
        return $class;
    }

    public function update_SessionClass(Request $req){
        $class = AcademicClass::findOrFail($req->id);
        $class->update($req->all());
        return redirect(route('institution.classes'))->with('success', 'Class has been Updated');
    }

    public function delete_SessionClass($id){
        $class = AcademicClass::findOrFail($id);
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
        return redirect('institution/subjects')->with('success', 'Subject Added Successfully');
    }

    public function edit_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        return $subject;
    }

    public function update_subject(Request $req){
        $subject = Subject::findOrFail($req->id);
        $subject->update($req->all());
        return redirect('institution/subjects')->with('success', 'Class has been Updated');
    }

    public function delete_subject($id){
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect('institution/subjects')->with('success', 'Class has been Deleted');
    }
    /*Subjects End*/

    /*Assign Subjects*/
    public function classsubjects()
    {
        $classes = AcademicClass::all()->pluck('name', 'id');
        $subjects = Subject::all()->pluck('name', 'id');
        $staffs = Staff::all()->pluck('name','id');
        $assigned_sub = AssignSubject::all();
        return view ('admin.institution.classsubjects', compact('classes', 'subjects','staffs','assigned_sub'));
    }

    public function assign_subject(Request $request){
        if ($request->id != null){
            $ass_subjects = AssignSubject::findOrFail($request->id);
            $data = $request->except('id');
            $ass_subjects->update($data);
            return redirect('institution/subjects/classsubjects')->with('success', 'Subjects Updated Successfully');
        }else{
            AssignSubject::query()->create($request->all());
            return redirect('institution/subjects/classsubjects')->with('success', 'Subjects assigned Successfully');
        }

    }

    public function delete_assigned($id){
        $ass_subject = AssignSubject::findOrFail($id);
        $ass_subject->delete();
        return redirect('institution/subjects/classsubjects')->with('success', 'Subjects Deleted Successfully');
    }

    public function edit_assigned(Request $request){
        $ass_subjects = AssignSubject::findOrFail($request->id);
        return $ass_subjects;
    }
    public function profile()
    {
        return view ('admin.institution.profile');
    }
}
