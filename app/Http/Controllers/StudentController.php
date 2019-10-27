<?php

namespace App\Http\Controllers;

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

    public function get_section(Request $req){
        $sections = Section::query()->where('session_id', $req->session_id)->where('class_id', $req->id)->get();
        return $sections;
    }
    public function create(){
        $sessions = Session::pluck('year','id');
        $last_session_id = Session::orderBy('id', 'desc')->value('id');
        $groups = Group::pluck('id', 'name');
        $classes = DB::table('session_classes')
            ->distinct()
            ->join('academic_classes', 'session_classes.academic_class_id', '=', 'academic_classes.id')
            ->where('session_classes.session_id', $last_session_id)
            ->pluck('academic_classes.name', 'session_classes.id');

        //$sections = Section::query()->where('session_id', $last_session_id)->pluck('section_name', 'id');
        $genders = Gender::pluck('name', 'id');
        $blood_groups = BloodGroup::pluck('name', 'id');
        $religions = Religion::pluck('name', 'id');
        $divisions= Division::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        return view('admin.student.add', compact('sessions', 'groups', 'classes', 'sections', 'genders', 'blood_groups', 'religions', 'divisions', 'countries'));
    }

    public function store(Request $req){
        //dd($req->all());
        if ($req->hasFile('file')){
            $image = $req->student_id.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/students/', $image);
            $data = $req->except('image');
            $data['image'] = $image;

            Student::create($data);
        }else{
            Student::create($req->all());
        }

        return redirect('stu_add')->with('success','Student Added Successfully');

    }
}
