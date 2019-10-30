<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\BloodGroup;
use App\Country;
use App\Division;
use App\Gender;
use App\Group;
use App\Religion;
use App\Section;
use App\Session;
use App\SessionClass;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        return view('admin.student.list');
    }

    /*public function get_section(Request $req){
        $sections = Section::query()->where('session_id', $req->session_id)->where('class_id', $req->id)->get();
        return $sections;
    }*/
    public function get_class_section($id){
        $classes = DB::table('session_classes')
            ->join('academic_classes', 'session_classes.academic_class_id', '=', 'academic_classes.id')
            ->join('sections', 'session_classes.id', '=', 'sections.class_id')
            ->where('session_classes.session_id', $id)
            ->get(['session_classes.id', 'academic_classes.name', 'sections.id as section_id', 'session_classes.section']);
        return $classes;
    }
    public function create(){
        $sessions = Session::pluck('year','id');
        $last_session_id = Session::orderBy('id', 'desc')->value('id');
        $groups = Group::pluck('name', 'id');
        $genders = Gender::pluck('name', 'id');
        $blood_groups = BloodGroup::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        $divisions= Division::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $classes = AcademicClass::all()->pluck('name','id');
        $sections = Section::all()->pluck('name','id');
        return view('admin.student.add', compact('sessions', 'groups', 'classes', 'sections', 'genders', 'blood_groups', 'religions', 'divisions', 'countries'));
    }

    public function store(Request $req){
        //dd($req->all());
        $data = $req->all(); //Temporary
        $data['section_id'] = 1; //temporary
        if ($req->hasFile('image')){
            $image = $req->studentId.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/students/', $image);
            $data = $req->except('image');
            $data['image'] = $image;
            Student::query()->create($data);
        }else{
            Student::query()->create($data);
        }

        return redirect('stu_add')->with('success','Student Added Successfully');

    }
}
