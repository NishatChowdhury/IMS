<?php

namespace App\Http\Controllers;

use App\Page;
use App\Father;
use App\Mother;
use App\Section;
use App\Session;
use App\Guardian;
use App\Student1;
use App\OnlineApply;
use App\AcademicClass;
use App\StudentAcademic;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;

class OnlineApplyController extends Controller
{
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function onlineApply()
    {
        $repository = $this->repository;
        $content = Page::query()->where('name','online-apply')->first();
        return view('front.pages.applySchool',compact('content'));
    }

    public function store(Request $req)
    {
        $rules = [
            'name' => 'required',
            'name_bn' => 'required',
            'birth_certificate' => 'required|integer',
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
            // 
            'f_name' => 'required',
            'f_name_bn' => 'required',
            'f_mobile' => 'required',
            'f_email' => 'required|email',
            'f_dob' => 'required',
            'f_occupation' => 'required',
            'f_nid' => 'required|integer',
            'f_birth_certificate' => 'required|integer',
            //
            'm_name' => 'required',
            'm_name_bn' => 'required',
            'm_mobile' => 'required',
            'm_email' => 'required|email',
            'm_dob' => 'required',
            'm_occupation' => 'required',
            'm_nid' => 'required|integer',
            'm_birth_certificate' => 'required|integer',
            //
            'g_name' => 'required',
            'g_name_bn' => 'required',
            'g_mobile' => 'required',
            'g_email' => 'required|email',
            'g_dob' => 'required',
            'g_occupation' => 'required',
            'g_nid' => 'required|integer',
            'g_birth_certificate' => 'required|integer',

        ];
    
        $customMessages = [
            'required' => 'The :attribute field is required.'
            // 'division_id.required' => 'The Division Must be field is requi
            
        ];
    
        $this->validate($req, $rules, $customMessages);

        $req->studentId = 76576;
        $data = $req->all();
      
        if ($req->hasFile('pic')){
            $image = $req->studentId.'.'.$req->file('pic')->getClientOriginalExtension();
            $req->file('pic')->move(public_path().'/assets/img/students/', $image);
            $data = $req->except('pic');
            $data['image'] = $image;
            try{
                $studentStore = OnlineApply::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            try{
                $studentStore = OnlineApply::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }

        $studentIdPrefix = 'STU-'.$studentStore->id;

        if(isset($studentStore->id)){
            OnlineApply::find($studentStore->id)->update([
                'applyId' => $studentIdPrefix,
            ]);
        }

        return back()->with('status','Your Admission Successfully Done Here Your ID '.$studentIdPrefix);
    }

    public function index()
    {
        $academicClass = AcademicClass::with('classes','sessions','section','group')->get();
        $sessions = Session::query()->get();
        $sections = Section::query()->get();
        $students = onlineApply::query()->orderBy('id')->paginate(100);
        return view('admin.student.online_apply', compact('students','academicClass','sessions','sections'));
    }

    public function getApplyInfoSession(Request $request)
    {
        $id = $request->academicYear;

        // $getSessionId =  AcademicClass::where('id', $id)->first();
 
         $academicYear = substr(trim(Session::query()->where('id',$id)->first()->year),-2);
         $incrementId = Student1::query()->max('id');
         $increment = $incrementId + 1;
         $studentId = 'S'.$academicYear.$increment;
         // return $academicYear;
         return $studentId;
    }

    public function applyStudentProfile($id)
    {
        $student = OnlineApply::find($id);
        return view('admin.student.applyStudentProfile', compact('student'));
    }

    public function moveToStudent(Request $req)
    {
        // return $req->all();
        $getOnlineApply = OnlineApply::find($req->onlineApplyID)->toarray();
        $getOnlineApply['studentId'] = $req->studentId;
         $data = $req->all();

        // $data['d'] = $getOnlineApply->sf ;
      

            try{
                $studentStore = Student1::query()->create($getOnlineApply);
            }catch (\Exception $e){
                dd($e);
            }
 

   

        $getAcademicClass = AcademicClass::where('session_id', $req->session_id)
                                         ->where('class_id', $getOnlineApply['class_id'])
                                         ->where('section_id', $req->section_id)
                                         ->where('group_id', $getOnlineApply['group_id'])
                                         ->first();

        if(!$getAcademicClass){
            return back()->with('status', 'Academic Class Not Match Try Again');
        }


        $student_academicStore = StudentAcademic::create([
            'academic_class_id' => $getAcademicClass->id,
            'student1_id' => $studentStore->id,
            'session_id' => $req->session_id,
            'class_id' => $getOnlineApply['class_id'],
            'section_id' => $req->section_id,
            'group_id' => $getOnlineApply['group_id'],
            'shift_id' => 0,
            'rank' => $req->rank,
        ]);

        $fatherStore = Father::create([
            'f_name' => $getOnlineApply['f_name'],
            'student1_id' => $studentStore->id,
            'f_name_bn' => $getOnlineApply['f_name_bn'],
            'f_mobile' => $getOnlineApply['f_mobile'],
            'f_email' => $getOnlineApply['f_email'],
            'f_dob' => $getOnlineApply['f_dob'],
            'f_occupation' => $getOnlineApply['f_occupation'],
            'f_nid' => $getOnlineApply['f_nid'],
            'f_birth_certificate' => $getOnlineApply['f_birth_certificate'],
        ]);
        
        $motherStore = Mother::create([
            'm_name' => $getOnlineApply['m_name'],
            'student1_id' => $studentStore->id,
            'm_name_bn' => $getOnlineApply['m_name_bn'],
            'm_mobile' => $getOnlineApply['m_mobile'],
            'm_email' => $getOnlineApply['m_email'],
            'm_dob' => $getOnlineApply['m_dob'],
            'm_occupation' => $getOnlineApply['m_occupation'],
            'm_nid' => $getOnlineApply['m_nid'],
            'm_birth_certificate' => $getOnlineApply['m_birth_certificate'],
        ]);

        $guardianStore = Guardian::create([
            'g_name' => $getOnlineApply['g_name'],
            'student1_id' => $studentStore->id,
            'g_name_bn' => $getOnlineApply['g_name_bn'],
            'g_mobile' => $getOnlineApply['g_mobile'],
            'g_email' => $getOnlineApply['g_email'],
            'g_dob' => $getOnlineApply['g_dob'],
            'g_occupation' => $getOnlineApply['g_occupation'],
            'g_nid' => $getOnlineApply['g_nid'],
            'g_birth_certificate' => $getOnlineApply['g_birth_certificate'],
        ]);

        OnlineApply::find($getOnlineApply['id'])->update([
            'status' => 1
        ]);

        return back();
    }

    public function getApplyInfo(Request $req)
    {
        $student = OnlineApply::find($req->id);

        // $className = $student->classes->name;
        // $groupName = $student->group->name;

        $data = [];
        $data['className'] = $student->classes->name;
        $data['groupName'] = $student->group->name;
        return $data;
    }
}
