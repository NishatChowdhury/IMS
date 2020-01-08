<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\AssignSubject;
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
use App\State;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
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
        $s = $student->newQuery()->where('session_id',activeYear());
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
//        $sessions = Session::all()->where('active',1)->pluck('year','id');
//        $last_session_id = Session::query()->orderBy('id', 'desc')->value('id');
//        $groups = Group::all()->pluck('name', 'id');
//        $genders = Gender::all()->pluck('name', 'id');
//        $blood_groups = BloodGroup::all()->pluck('name', 'id');
//        $religions = Religion::all()->pluck('name', 'id');
//        $divisions= Division::all()->pluck('name', 'id');
//        $countries = Country::all()->pluck('name', 'id');
//        $classes = AcademicClass::all()->pluck('name','id');
//        $sections = Section::all()->pluck('name','id');
        $repository = $this->repository;
        return view('admin.student.add', compact('repository'));
    }

    public function store(Request $req){
        $this->validate($req,[
            'session_id'=>'required',
            'class_id'=>'required',
            'rank'=>'required',
            'name'=>'required',
            //'gender_id'=>'required',
            'father'=>'required',
            'mother'=>'required',
            //'religion_id'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'status'=>'required',
        ],[

        ]);
        //dd($req->all());
        $data = $req->all();
        if ($req->hasFile('image')){
            $image = $req->studentId.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/students/', $image);
            $data = $req->except('image');
            $data['image'] = $image;
            Student::query()->create($data);
        }else{
            Student::query()->create($data);
        }

        return redirect()->route('student.list')->with('success','Student Added Successfully');

    }

    public function edit($id)
    {
        $student = Student::query()->findOrFail($id);
        $repository = $this->repository;
        return view('admin.student.edit',compact('student','repository'));
    }

    public function update($id, Request $request)
    {
        $student = Student::query()->findOrFail($id);

        $this->validate($request,[
            'session_id'=>'required',
            'class_id'=>'required',
            'rank'=>'required',
            'name'=>'required',
            //'gender_id'=>'required',
            'father'=>'required',
            'mother'=>'required',
            //'religion_id'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'status'=>'required',
        ],[

        ]);
        //dd($req->all());
        $data = $request->all();
        if ($request->hasFile('image')){
            $image = $request->studentId.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/students/', $image);
            $data = $request->except('image');
            $data['image'] = $image;
            //Student::query()->create($data);
        }else{
            $student->update($data);
        }

        \Illuminate\Support\Facades\Session::flash('success','Student has been updated successfully!');

        return redirect('students');
    }

    public function loadStudentId(Request $request){
        $academicYear = substr(trim(Session::query()->where('id',$request->academicYear)->first()->year),-2);
        $incrementId = Student::query()->max('id');
        $increment = $incrementId + 1;
        $studentId = 'S'.$academicYear.$increment;
        return $studentId;

    }

    public function optional(Request $request, Student $student)
    {
        if($request->all()){
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

            $students = $s->get();
        }else{
            $students = [];
        }

        $repository = $this->repository;

        return view('admin.student.optional',compact('repository','students'));
    }

    public function assignOptional(Request $request)
    {
        $ids = $request->get('student_id');

        foreach($ids as $key => $id){
            $student = Student::query()->findOrFail($id);
            $subject = $request->get('subject_id')[$key];
            $student->update(['subject_id'=>$subject]);
        }

        \Illuminate\Support\Facades\Session::flash('success','Subject Assigned');

        return redirect()->back();
    }

    public function promotion(Request $request, Student $student)
    {
        if($request->has('class_id')){
            $s = $student->newQuery()->where('session_id',1);
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

            $students = $s->get();
        }else{
            $students = collect();
        }

        $repository = $this->repository;
        return view('admin.student.promotion',compact('students','repository'));
    }

    public function promote(Request $request)
    {
        $ids = $request->get('ids');

        foreach($ids as $key => $id){
            $student = Student::query()->findOrFail($id);
            $data['name'] = $student->name;
            $data['studentId'] = $student->studentId;
            $data['session_id'] = $request->session_id;
            $data['class_id'] = $request->class_id;
            $data['section_id'] = $request->section_id;
            $data['group_id'] = $request->group_id;
            $data['rank'] = $request->get('rank')[$key];
            $data['father'] = $student->father;
            $data['mother'] = $student->mother;
            $data['gender_id'] = $student->gender_id;
            $data['mobile'] = $student->mobile;
            $data['dob'] = $student->dob;
            $data['blood_group_id'] = $student->blood_group_id;
            $data['religion_id'] = $student->religion_id;
            $data['image'] = $student->image;
            $data['address'] = $student->address;
            $data['area'] = $student->area;
            $data['zip'] = $student->zip;
            $data['state_id'] = $student->state_id;
            $data['country_id'] = $student->country_id;
            $data['email'] = $student->email;
            $data['father_mobile'] = $student->father_mobile;
            $data['mother_mobile'] = $student->mother_mobile;
            $data['notification_type_id'] = $student->notification_type_id;
            $data['status'] = $student->status;
            Student::query()->create($data);
        }

        return redirect()->back();
    }

    public function dropOut($id)
    {
        $student = Student::query()->findOrFail($id);
        $student->update(['status'=>2]);
        return redirect()->back();
    }

    public function export()
    {
        $table = Student::all()->where('session_id',2);
        $filename = "students.csv";
        $handle = fopen($filename, 'w+');
        fputcsv($handle, [
            'id',
            'name',
            'studentId',
            'session_id',
            'class_id',
            'section_id',
            'group_id',
            'rank',
            'father',
            'mother',
            'gender_id',
            'mobile',
            'dob',
            'blood_group_id',
            'religion_id',
            'image',
            'address',
            'area',
            'zip',
            'state_id',
            'country_id',
            'email',
            'father_mobile',
            'mother_mobile',
            'notification_type_id',
            'status'
        ]);

        foreach($table as $row) {
            fputcsv($handle, [
                $row['id'],
                $row['name'],
                $row['studentId'],
                Session::query()->findOrFail($row['session_id'])->year,
                AcademicClass::query()->findOrNew($row['class_id'])->name,
                Section::query()->findOrNew($row['section_id'])->name,
                Group::query()->findOrNew($row['group_id'])->name,
                $row['rank'],
                $row['father'],
                $row['mother'],
                Gender::query()->findOrNew($row['gender_id'])->name,
                $row['mobile'],
                $row['dob'],
                BloodGroup::query()->findOrNew($row['blood_group_id'])->name,
                Religion::query()->findOrNew($row['religion_id'])->name,
                $row['image'],
                $row['address'],
                $row['area'],
                $row['zip'],
                State::query()->findOrNew($row['state_id'])->name,
                Country::query()->findOrNew($row['state_id'])->name,
                $row['email'],
                $row['father_mobile'],
                $row['mother_mobile'],
                $row['notification_type_id'],
                $row['status'],
            ]);
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'students.csv', $headers);
    }
}
