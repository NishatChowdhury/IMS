<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\AssignSubject;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\City;
use App\Models\Backend\Classes;
use App\Models\Backend\Country;
use App\Models\Backend\Father;
use App\Models\Backend\Gender;
use App\Models\Backend\Group;
use App\Models\Backend\Guardian;
use App\Models\Backend\Location;
use App\Models\Backend\Mother;
use App\Models\Backend\OnlineSubject;
use App\Models\Backend\Religion;
use App\Models\Backend\Section;
use App\Models\Backend\Session;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentLogin;
use App\Models\Backend\StudentPayment;
use App\Models\Backend\StudentSubject;
use App\Models\Backend\Subject;
use App\Models\LocationStudent;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

//use App\State;

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

        $s = $student->newQuery()
            ->whereHas('academics', function($query){
                $query->whereHas('sessions', function($query){
                    return $query->where('active',1);
                });
            });

        if($request->get('studentId')){
            $studentId = $request->get('studentId');
            $s->where('studentId',$studentId);
        }

        if($request->get('name')){
            $name = $request->get('name');
            $s->where('name','like','%'.$name.'%');
        }
        if($request->get('session_id')){
            $session = $request->get('session_id');
            $s->where('session_id',$session);
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

        if($request->has('csv')){
            $table = Student::orderBy('studentId')
                ->whereHas('academics', function($query){
                    $query->whereHas('sessions', function($query){
                        return $query->where('active', '=', 1);
                    });
                })->get();
//            dd($table);

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
                'city_id',
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
                    City::query()->findOrNew($row['city_id'])->name,
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

        // return activeYear();
        // $students =  StudentAcademic::whereHas('sessions', function ($query) {
        //     return $query->where('active', '=', 1);
        // })->with('student')->paginate(100);  

//        $students = Student::query()
//            ->orderBy('studentId')
//            ->whereHas('academics', function($query){
//                $query->whereHas('sessions', function($query){
//                    return $query->where('active', '=', 1);
//                });
//            })
//            ->paginate(100);
        // $students = $s->orderBy('rank')->paginate(100);
//        dd($s->get());
        $students = $s->orderBy('studentId')->paginate(100);
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
        $repository = $this->repository;
        $academicClass = AcademicClass::with('classes','sessions','section','group')->get();
        return view('admin.student.create', compact('repository','academicClass'));
    }

    public function store(Request $req){


        $rules = [
            'name' => 'required',
            'name_bn' => 'required',
            'birth_certificate' => 'required|integer',
            'nationality' => 'required',
            'disability' => 'required',
            'studentId' => 'required|unique:students',
            'status' => 'required',
            'dob' => 'required',
            'gender_id' => 'required',
            'blood_group_id' => 'required',
            'religion_id' => 'required',
            'address' => 'required',
            'area' => 'required',
            'zip' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
            // 'division_id.required' => 'The Division Must be field is requi

        ];

        $this->validate($req, $rules, $customMessages);

        $data = $req->all();

        if ($req->hasFile('pic')){
            $image = $req->studentId.'.'.$req->file('pic')->getClientOriginalExtension();
            $req->file('pic')->move(storage_path('app/public/uploads/students/'), $image);
            $data = $req->except('pic');
            $data['image'] = $image;
            try{
                $studentStore = Student::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            try{
                $studentStore = Student::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }
                StudentLogin::create([
                    'name' =>  $studentStore->name,
                    'student_id' => $studentStore->id,
                    'studentId' => $studentStore->studentId,
                    'password' => Hash::make('student123'),
                ]);
        $getAcademicClass = AcademicClass::find($req->academic_class_id);

        StudentAcademic::create([
            'academic_class_id' => $req->academic_class_id,
            'student_id' => $studentStore->id,
            'session_id' => $getAcademicClass->session_id,
            'class_id' => $getAcademicClass->class_id,
            'section_id' => $getAcademicClass->section_id,
            'group_id' => $getAcademicClass->group_id,
            'shift_id' => 0,
            'rank' => $req->rank,
        ]);

        Father::create([
            'f_name' => $req->f_name,
            'student_id' => $studentStore->id,
            'f_name_bn' => $req->f_name_bn,
            'f_mobile' => $req->f_mobile,
            'f_email' => $req->f_email,
            'f_dob' => $req->f_dob,
            'f_occupation' => $req->f_occupation,
            'f_nid' => $req->f_nid,
            'f_birth_certificate' => $req->f_birth_certificate,
        ]);

        Mother::create([
            'm_name' => $req->m_name,
            'student_id' => $studentStore->id,
            'm_name_bn' => $req->m_name_bn,
            'm_mobile' => $req->m_mobile,
            'm_email' => $req->m_email,
            'm_dob' => $req->m_dob,
            'm_occupation' => $req->m_occupation,
            'm_nid' => $req->m_nid,
            'm_birth_certificate' => $req->m_birth_certificate,
        ]);

        Guardian::create([
            'g_name' => $req->g_name,
            'student_id' => $studentStore->id,
            'g_name_bn' => $req->g_name_bn,
            'g_mobile' => $req->g_mobile,
            'g_email' => $req->g_email,
            'g_dob' => $req->g_dob,
            'g_occupation' => $req->g_occupation,
            'g_nid' => $req->g_nid,
            'g_birth_certificate' => $req->g_birth_certificate,
        ]);

        return redirect('admin/students')->with('success','Student Added Successfully');

    }

    public function edit($id)
    {
        $student = Student::query()->findOrFail($id);

        $father = Father::query()->where('student_id', $id)->first();
        $mother = Mother::query()->where('student_id', $id)->first();
        $guardian = Guardian::query()->where('student_id', $id)->first();
        $studentAcademic = StudentAcademic::query()->where('student_id', $id)->first();
        $academicClass = AcademicClass::with('classes','sessions','section','group')->get();

        $repository = $this->repository;
        return view('admin.student.edit',compact('student','repository','father','mother','guardian','studentAcademic','academicClass'));
    }

    public function update($id, Request $request)
    {
        $student = Student::query()->findOrFail($id);

        $rules = [
            'name' => 'required',
            'name_bn' => 'required',
            'f_name' => 'required',
            'f_name_bn' => 'required',
            'birth_certificate' => 'required|integer',
            'nationality' => 'required',
            'disability' => 'required',
            'studentId' => 'required|unique:students,studentId,'.$student->id,
            'status' => 'required',
            'dob' => 'required',
            'gender_id' => 'required',
            'blood_group_id' => 'required',
            'religion_id' => 'required',
            'address' => 'required',
            'area' => 'required',
            'zip' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'mobile' => 'required',
            'email' => 'required',
        ];

        $customMessages = [
            'required' => 'The :attribute field is required.'
        ];

        $this->validate($request,$rules,$customMessages);

        $data = $request->all();

        if ($request->hasFile('pic')){
            $image = date('YmdHis').'.'.$request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->move(storage_path('app/public/uploads/students/'), $image);
            $data = $request->except('pic');
            $data['image'] = $image;
            try{
                $student->update($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            $student->update($data);
        }


        $getAcademicClass = AcademicClass::query()->find($request->academic_class_id);

        StudentAcademic::query()->findOrNew($request->sa_id)->updateOrCreate([
            'academic_class_id' => $request->academic_class_id,
            'student_id' => $student->id,
            'session_id' => $getAcademicClass->session_id,
            'class_id' => $getAcademicClass->class_id,
            'section_id' => $getAcademicClass->section_id,
            'group_id' => $getAcademicClass->group_id,
            'shift_id' => 0,
            'rank' => $request->rank,
        ]);

        Father::query()->findOrNew($request->f_id)->updateOrCreate([
            'f_name' => $request->f_name,
            'student_id' => $student->id,
            'f_name_bn' => $request->f_name_bn,
            'f_mobile' => $request->f_mobile,
            'f_email' => $request->f_email,
            'f_dob' => $request->f_dob,
            'f_occupation' => $request->f_occupation,
            'f_nid' => $request->f_nid,
            'f_birth_certificate' => $request->f_birth_certificate,
        ]);

        Mother::query()->findOrNew($request->m_id)->updateOrCreate([
            'm_name' => $request->m_name,
            'student_id' => $student->id,
            'm_name_bn' => $request->m_name_bn,
            'm_mobile' => $request->m_mobile,
            'm_email' => $request->m_email,
            'm_dob' => $request->m_dob,
            'm_occupation' => $request->m_occupation,
            'm_nid' => $request->m_nid,
            'm_birth_certificate' => $request->m_birth_certificate,
        ]);

        Guardian::query()->findOrNew($request->g_id)->updateOrCreate([
            'g_name' => $request->g_name,
            'student_id' => $student->id,
            'g_name_bn' => $request->g_name_bn,
            'g_mobile' => $request->g_mobile,
            'g_email' => $request->g_email,
            'g_dob' => $request->g_dob,
            'g_occupation' => $request->g_occupation,
            'g_nid' => $request->g_nid,
            'g_birth_certificate' => $request->g_birth_certificate,
        ]);

        \Illuminate\Support\Facades\Session::flash('success','Student has been updated successfully!');

        return redirect('admin/students');
//        return redirect()->back();
    }

    public function loadStudentId(Request $request){

        $id = $request->academicYear;

        $getSessionId =  AcademicClass::where('id', $id)->first();

        $academicYear = substr(trim(Session::query()->where('id',$getSessionId->session_id)->first()->year),-2);
        $incrementId = Student::query()->max('id');
        $increment = $incrementId + 1;
        $studentId = 'S'.$academicYear.$increment;
        // return $academicYear;
        return $studentId;
    }

    public function optional(Request $request, StudentAcademic $academic)
    {

         $academicclasses = AcademicClass::whereHas('sessions', function($query){
                    return $query->where('active', '=', 1);
                })->get();
        $subjects = Subject::all();
        if($request->has('academic_class_id')){
            $className = AcademicClass::find($request->academic_class_id);
             $notAssignsubjects = $className->subjects;
             $academicsubjects = AssignSubject::where('academic_class_id', $request->academic_class_id)->get();
            $s = $academic->newQuery();
            $s->where('academic_class_id',$request->get('academic_class_id'));
//            $s->whereHas('studentSubject', function($query){
//               return $query->whereHas('subject', function($q){
//                   return $q->where('type', 1);
//               });
//            });
            $s->with('studentSubject');
             $students = $s->get();
        }else{
            $students = NULL;
            $className = NULL;
            $notAssignsubjects = NULL;
            $academicsubjects = NULL;
        }

        return view('admin.student.optional', compact('academicsubjects','subjects','students','academicclasses','className','notAssignsubjects'));
    }

    public function assignOptional(Request $request)
    {
        $academic_class_id = $request->academic_class_id;
        $subjectType = $request->subject_type;
        $data = [];
         $data['studentAcademic'] = StudentAcademic::where('academic_class_id', $academic_class_id)->get();
        $data['subjects'] = Subject::where('type', $subjectType)->get();
        $data['allSubjects'] = Subject::count();

        return redirect('admin/student/optional')->with($data);

    }

    function subjectStudent(Request $req){

        $studentAcademic = StudentAcademic::where('student_id', $req->id)->first();
         StudentSubject::where('student_id', $req->id)->delete();
        foreach ($req->subjects as $sb){
            StudentSubject::create([
                'student_academic_id' => $studentAcademic->id,
                'student_id' => $req->id,
                'subject_id' => $sb,
            ]);
        }

         return back();
    }


    public function promotion(Request $request, Student $student)
    {
        if($request->has('class_id')){
            $s = $student->newQuery();
            if($request->get('studentId')){
                $studentId = $request->get('studentId');
                $s->where('studentId',$studentId);
            }
            if($request->get('session_id')){
                $session = $request->get('session_id');
                $s->where('session_id',$session);
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

            $students = $s->where('status',1)->get();
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

//                $academicClassId = AcademicClass::query()
//                    ->where('session_id',$request->session_id)
//                    ->where('class_id',$request->class_id)
//                    ->where('section_id',$request->section_id)
//                    ->where('group_id',$request->group_id)
//                    ->first();

            $academicClassId = AcademicClass::query();

            if($request->has('session_id')){
                $academicClassId->where('session_id',$request->session_id);
            }
            if($request->has('class_id')){
                $academicClassId->where('class_id',$request->class_id);
            }
            if($request->has('section_id')){
                $academicClassId->where('section_id',$request->section_id);
            }
            if($request->has('group_id')){
                $academicClassId->where('group_id',$request->group_id);
            }

            $academicClassId = $academicClassId->first();

            $data['name'] = $student->name;
            $data['studentId'] = $student->studentId;
            $data['academic_class_id'] = $academicClassId->id ?? null;
            $data['session_id'] = $request->session_id;
            $data['class_id'] = $request->class_id;
            $data['section_id'] = $request->section_id;
            $data['group_id'] = $request->group_id;
            $data['rank'] = $request->get('rank')[$id];
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
            $data['bcn'] = $student->bcn;
            $data['father_occupation'] = $student->father_occupation;
            $data['mother_occupation'] = $student->mother->occupation;
            $data['other_guardian'] = $student->other_guardian;
            $data['guardian_national_id'] = $student->guardian_national_id;
            $data['yearly_income'] = $student->yearly_income;
            $data['guardian_address'] = $student->guardian_address;
            $data['bank_slip'] = $student->bank_slip;
            $data['ssc_roll'] = $student->ssc_roll;
            $data['location_id'] = $student->location_id;
            $data['shift_id'] = $student->shift_id;
            $data['subjects'] = $student->subjects;
            $data['ssc_roll'] = $student->ssc_roll;
            $data['ssc_registration'] = $student->ssc_registration;
            $data['ssc_session'] = $student->ssc_session;
            $data['ssc_year'] = $student->ssc_year;
            $data['ssc_board'] = $student->ssc_board;
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


    public function testimonial()
    {
        return view('admin.student.testimonial');
    }

    public function csvDownload()
    {
//        $table = Student::all()->where('session_id',2);
        $table = Student::orderBy('studentId')
            ->whereHas('academics', function($query){
                $query->whereHas('sessions', function($query){
                    return $query->where('active', '=', 1);
                });
            })->get();
//        dd($table);
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
            $studentAcademic = StudentAcademic::query()->where('student_id', $row['id'])->first();
            fputcsv($handle, [
                $row['id'],
                $row['name'],
                $row['studentId'],
                Session::query()->findOrFail($studentAcademic->session_id)->year,
                classes::query()->findOrNew($studentAcademic->class_id)->name,
                Section::query()->findOrNew($studentAcademic->section_id)->name,
                Group::query()->findOrNew($row['group_id'])->name,
                $studentAcademic->rank,
                Father::query()->findOrNew($row['id'])->f_name,
                Mother::query()->findOrNew($row['id'])->m_name,
                Gender::query()->findOrNew($row['gender_id'])->name,
                $row['mobile'],
                $row['dob'],
                BloodGroup::query()->findOrNew($row['blood_group_id'])->name,
                Religion::query()->findOrNew($row['religion_id'])->name,
                $row['image'],
                $row['address'],
                $row['area'],
                $row['zip'],
                City::query()->findOrNew($row['city_id'])->name,
                Country::query()->findOrNew($row['state_id'])->name,
                $row['email'],
                Father::query()->findOrNew($row['id'])->f_mobile,
                Mother::query()->findOrNew($row['id'])->m_mobile,
                $row['email'],
                $row['status'],
            ]);
        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, 'students.csv', $headers);
    }


    public function downloadBlank($academicClassId)
    {
        $academicClass = AcademicClass::query()->findOrFail($academicClassId);

        $class = $academicClass->academicClasses->name;
        $group = $academicClass->group->name ?? '';
        $section = $academicClass->section->name ?? '';

        $filename = $class.$section.$group.".csv";

        $handle = fopen($filename, 'w+');
        fputcsv($handle, array('id', 'name', 'studentId','rank','father','mother','gender_id','mobile','dob','blood_group_id','religion_id','image','address','area','zip','city_id','country_id','email','father_mobile','mother_mobile'));

//        foreach($table as $row) {
//            fputcsv($handle, array($col['tweet_text'], $col['screen_name'], $col['name'], $col['created_at']));
//        }

        fclose($handle);

        $headers = array(
            'Content-Type' => 'text/csv',
        );

        return Response::download($filename, $filename, $headers);
    }

    public function uploadStudent($academicClassId)
    {
        $academicClass = AcademicClass::query()->findOrFail($academicClassId);
        return view('admin.student.upload',compact('academicClass'));
    }

    public function up(Request $request)
    {
        $academicClass = AcademicClass::query()->findOrFail($request->get('academic_class_id'));

        $academicYear = substr(trim(Session::query()->where('id',$academicClass->session_id)->first()->year),-2);
        $incrementId = Student::query()->max('id');
        $increment = $incrementId + 1;
        $studentId = 'S'.$academicYear.$increment;

        //dd(file($request->file));
        $file = file($request->file('file'));

        $sl = 0;
        foreach($file as $row){
            if($sl != 0){
                $col = explode(',',$row);

                $data['name'] = $col[1];
                $data['studentId'] = $studentId;
                $data['academic_class_id'] = $request->get('academic_class_id');
                $data['session_id'] = $academicClass->session_id;
                $data['class_id'] = $academicClass->class_id;
                $data['section_id'] = $academicClass->section_id;
                $data['group_id'] = $academicClass->group_id;
                $data['rank'] = $col[3];
                $data['father'] = $col[4];
                $data['mother'] = $col[5];
                $data['gender_id'] = null;
                $data['mobile'] = $col[7];
                $data['dob'] = $col[8];
                $data['blood_group_id'] = null;
                $data['religion_id'] = null;
                $data['image'] = $col[11];
                $data['address'] = $col[12];
                $data['area'] = $col[13];
                $data['zip'] = $col[14];
                $data['city_id'] = null;
                $data['country_id'] = null;
                $data['email'] = $col[17];
                $data['father_mobile'] = $col[18];
                $data['mother_mobile'] = $col[19];
                $data['notification_type_id'] = 0;
                $data['status'] = 1;

                Student::query()->create($data);
            }
            $sl++;
        }

        return redirect('institution/academic-class');
    }

    public function studentProfile($studentId)
    {

        $student = Student::query()->findOrFail($studentId);
        $data = [];
        $data['father'] = Father::query()->where('student_id', $studentId)->first();
        $data['mother'] = Mother::query()->where('student_id', $studentId)->first();
        $data['guardian'] = Guardian::query()->where('student_id', $studentId)->first();
         $studentAcademic = StudentAcademic::query()->where('student_id', $studentId)
            ->with('classes','section','group')
            ->first();
        // return $studentAcademic;
        $data['academicClass'] = AcademicClass::with('classes','sessions','section','group')->get();
        // $payments = StudentPayment::query()->where('student_id',$studentId)->get();
          $payments = StudentPayment::query()
                                    ->where('student_academic_id',$studentAcademic->id)
                                    ->get();
//        if($payments){
//            $payments = StudentPayment::query()
//                                    ->whereHas('academics', function($q) use($studentId){
//                                      return $q->where('student_id',$studentId);
//                                    })->exists();
//        }else{
//            $payments = [];
//        }
//            return $payments;

        return view('admin.student.studentProfile',compact('student','payments','data','studentAcademic'));

// ->whereHas('academics', function($query){
//                          $query->whereHas('sessions', function($query){
//                             return $query->where('active', '=', 1);
//                          });
//                     })

    }

    public function tod(Request $request)
    {
        if($request->has('session_id') && $request->has('class_id')){
            $students = Student::query()
                ->where('session_id',$request->get('session_id'))
                ->where('class_id',$request->get('class_id'))
                ->orderBy('rank')
                ->get();
        }else{
            $students = [];
        }

        $repository = $this->repository;
        return view('admin.student.tod',compact('students','repository'));
    }

    public function esif(Request $request)
    {
        if($request->has('session_id') && $request->has('class_id') && $request->has('group_id')){
            $group = Group::query()->findOrFail($request->get('group_id'));
            $class = Classes::query()->findOrFail($request->get('class_id'));
            $students = Student::query()
                ->where('session_id',$request->get('session_id'))
                ->where('class_id',$request->get('class_id'))
                ->where('group_id',$request->get('group_id'))
                ->orderBy('rank')
                ->get();
        }else{
            $students = [];
            $group = null;
            $class = null;
        }

        $repository = $this->repository;
        return view('admin.student.esif',compact('students','repository','group','class'));
    }

    public function images(Request $request)
    {
        if($request->has('session_id') && $request->has('class_id') && $request->has('group_id')){
            $students = Student::query()
                ->where('session_id',$request->get('session_id'))
                ->where('class_id',$request->get('class_id'))
                ->where('group_id',$request->get('group_id'))
                ->get();
        }else{
            $students = [];
        }

        $repository = $this->repository;
        return view('admin.student.images',compact('students','repository'));
    }


    public function subjects($id)
    {
        $student = Student::query()->findOrFail($id);
        $studentSubject = StudentSubject::query()
                                        ->where('student_id',$id)
                                        ->get();

        $compulsory = OnlineSubject::query()
            //->where('group_id',$student->group_id)
            ->where('type',1)
            ->get();

        $selective = OnlineSubject::query()
            ->where('group_id',$student->group_id)
            ->where('type',2)
            ->get();

        $optional = OnlineSubject::query()
            ->where('group_id',$student->group_id)
            ->where('type',3)
            ->get();

        $subjects = json_decode($student->subjects);

        return view('admin.student.subjects',compact('student','compulsory','selective','optional','subjects','studentSubject'));
    }

    public function assignSubject($id, Request $request)
    {
        $student = Student::query()->findOrFail($id);
        $subjects = json_encode($request->get('subjects'));
        $student->update(['subjects'=>$subjects]);
        \Illuminate\Support\Facades\Session::flash('success','Subject has been assigned!');
        return redirect()->back();
    }

    public function assignTransport(Request $request)
    {
         $academicClass = AcademicClass::query()
                                        ->whereHas('sessions', function($q){
                                            return $q->where('active', 1);
                                        })->get();
         if($request->get('academic_class_id')){
                 $students = StudentAcademic::query()
                                                    ->where('academic_class_id', $request->academic_class_id)
                                                    ->with('student')
                                                    ->get();
             $locations = Location::all();
             $locationStudents = LocationStudent::all();
         }else{
             $students = [];
             $locations = [];
             $locationStudents = [];
         }
        return view('admin.student.assignTransport', compact('academicClass','students','locations','locationStudents'));
    }

    public function storeAssignTransport(Request $request)
    {

        $student = $request->student_id;
         foreach ($student as $key => $stu){

             LocationStudent::create([
                 'student_id' => $stu,
                 'location_id' => $request->location_id[$key] ?? 0,
                 'direction' => $request->direction[$key] ?? 0,
             ]);
         }

        return back();

    }

}
