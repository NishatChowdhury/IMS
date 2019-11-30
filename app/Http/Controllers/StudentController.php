<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\BloodGroup;
use App\Country;
use App\Division;
use App\Gender;
use App\Group;
use App\Religion;
use App\Repository\StudentRepository;
use App\Section;
use App\Session;
use App\SessionClass;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class StudentController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index(Request $request,Student $student){
        //dd($request->all());
        $s = $student->newQuery();
        if($request->get('studentId')){
            $studentId = $request->get('studentId');
            $s->where('studentId',$studentId);
        }
        if($request->get('name')){
            $name = $request->get('name');
            $s->where('name','like','%'.$name.'%');
        }
        if($request->get('class_id')){
            $class = $request->get('class_id');
            $s->where('class_id',$class);
        }
        if($request->get('section_id')){
            $section = $request->get('section_id');
            $s->where('section_id',$section);
        }
        if($request->get('group_id')){
            $group = $request->get('group_id');
            $s->where('group_id',$group);
        }

        $students = $s->paginate(20);
        $repository = $this->repository;
        return view('admin.student.list',compact('students','repository'));
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
        $sessions = Session::all()->pluck('year','id');
        $last_session_id = Session::query()->orderBy('id', 'desc')->value('id');
        $groups = Group::all()->pluck('name', 'id');
        $genders = Gender::all()->pluck('name', 'id');
        $blood_groups = BloodGroup::all()->pluck('name', 'id');
        $religions = Religion::all()->pluck('name', 'id');
        $divisions= Division::all()->pluck('name', 'id');
        $countries = Country::all()->pluck('name', 'id');
        $classes = AcademicClass::all()->pluck('name','id');
        $sections = Section::all()->pluck('name','id');
        $repository = $this->repository;
        return view('admin.student.add', compact('sessions', 'groups', 'classes', 'sections', 'genders', 'blood_groups', 'religions', 'divisions', 'countries','repository'));
    }

    public function store(Request $req){
        dd($req->all());
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
