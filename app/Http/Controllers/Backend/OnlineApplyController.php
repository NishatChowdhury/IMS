<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\Confirm;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Classes;
use App\Models\Backend\Father;
use App\Models\Backend\Group;
use App\Models\Backend\Guardian;
use App\Models\Backend\Mother;
use App\Models\Backend\OnlineAdmission;
use App\Models\Backend\OnlineApply;
use App\Models\Backend\Section;
use App\Models\Backend\Session;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OnlineApplyController extends Controller
{
    protected $repository;

    public function __construct(StudentRepository $repository)
    {
        //$this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $academicClass = AcademicClass::with('classes','sessions','section','group')->get();
        $sessions = Session::query()->get();
        $sections = Section::query()->get();
        $students = onlineApply::query()->orderBy('id')->paginate(100);
        return view('admin.admission.applicant-school', compact('students','academicClass','sessions','sections'));
    }

    public function onlineApplyCollege()
    {
        return view('front.admission.validate-admission');
    }

    public function onlineApply($id = null)
    {
        $data = [];
        $data['gender'] = Gender::all()->pluck('name', 'id');
        $data['blood'] = BloodGroup::all()->pluck('name', 'id');
        $data['divi'] = Division::all()->pluck('name', 'id');
        $data['class'] = Classes::all()->pluck('name', 'id');
        $data['group'] = Group::all()->pluck('name', 'id');
        $data['city'] = City::all()->pluck('name', 'id');
        $data['country'] = Country::all()->pluck('name', 'id');
        $data['religion'] = Religion::all()->pluck('name','id');
        $onlineAdmission = OnlineAdmission::find($id);
        return view('front.pages.school-admission-form',compact('data','onlineAdmission'));
        // return view('front.pages.applySchool',compact('content'));
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
            // 
            'f_name' => 'required',
            'f_name_bn' => 'required',
            'f_mobile' => 'required',
            'f_dob' => 'required',
            'f_occupation' => 'required',
            'f_nid' => 'required|integer',
            //
            'm_name' => 'required',
            'm_name_bn' => 'required',
            'm_mobile' => 'required',
            'm_dob' => 'required',
            'm_occupation' => 'required',
            'm_nid' => 'required|integer',
            //
            'g_name' => 'required',
            'g_name_bn' => 'required',
            'g_mobile' => 'required',
            'g_dob' => 'required',
            'g_occupation' => 'required',
            'g_nid' => 'required|integer',

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


        if($req->email){
            $details = [
                'title' => config('app'),
                'id' => $studentStore->id,
                'name' => $studentStore->name,
                'url' => route('download.school.form', $studentStore->id),
            ];
            Mail::to($req->email)->send(new AdmissionMail($details));
           
        }

        if(siteConfig('admission_sms') == 1){

            $smsData = [];
            $smsData['mobile'] = $req->mobile;
            $smsData['id'] = $studentStore->id;
            $smsData['textbody'] = "Application successfully done! You Application ID-".$studentStore->id;
            $this->sms($smsData);
        }


   











        
        return redirect('admission-success-school')->with(['studentStore' => $studentStore]);
        // return back()->with('status','Your Admission Successfully Done Here Your ID ');
    }



    public function getApplyInfoSession(Request $request)
    {
        $id = $request->academicYear;

        // $getSessionId =  AcademicClass::where('id', $id)->first();
 
         $academicYear = substr(trim(Session::query()->where('year',$id)->first()->year),-2);
         $incrementId = Student::query()->max('id');
         $increment = $incrementId + 1;
         $studentId = 'S'.$academicYear.$increment;
         // return $academicYear;
         return $studentId;
    }

    public function applyStudentProfile($id)
    {
        $academicClass = AcademicClass::with('classes','sessions','section','group')->get();
        $sessions = Session::query()->get();
        $sections = Section::query()->get();
        $student = OnlineApply::find($id);
        return view('admin.student.applyStudentProfile', compact('student','academicClass','sessions','sections'));
    }

    public function moveToStudent(Request $req)
    {
        //  return $req->session_id;
        $getOnlineApply = OnlineApply::find($req->onlineApplyID)->toarray();
        $getOnlineApply['studentId'] = $req->studentId;

            try{
                $studentStore = Student::query()->where('studentId', $req->studentId)->exists();
                if(!$studentStore){
                    $studentStore = Student::query()->create($getOnlineApply);
                }else{
                    return back()->with('status', 'Student Id Match');
                }
            }catch (\Exception $e){
                dd($e);
            }
 

        $getAcademicClass = AcademicClass::query()
                                                ->where('session_id', $req->session_id)
                                                ->where('class_id', $getOnlineApply['class_id'])
                                                ->where('group_id', $getOnlineApply['group_id'])
                                                ->first();

        if(!$getAcademicClass){
            return back()->with('status', 'Academic Class Not Match Try Again');
        }


        $student_academicStore = StudentAcademic::create([
            'academic_class_id' => $getAcademicClass->id,
            'student_id' => $studentStore->id,
            'session_id' => $req->session_id,
            'class_id' => $getOnlineApply['class_id'],
            'group_id' => $getOnlineApply['group_id'],
            'shift_id' => 0,
            'rank' => $req->rank,
        ]);

        Father::create([
            'f_name' => $getOnlineApply['f_name'],
            'student_id' => $studentStore->id,
            'f_name_bn' => $getOnlineApply['f_name_bn'],
            'f_mobile' => $getOnlineApply['f_mobile'],
            'f_email' => $getOnlineApply['f_email'],
            'f_dob' => $getOnlineApply['f_dob'],
            'f_occupation' => $getOnlineApply['f_occupation'],
            'f_nid' => $getOnlineApply['f_nid'],
            'f_birth_certificate' => $getOnlineApply['f_birth_certificate'],
        ]);
        
        Mother::create([
            'm_name' => $getOnlineApply['m_name'],
            'student_id' => $studentStore->id,
            'm_name_bn' => $getOnlineApply['m_name_bn'],
            'm_mobile' => $getOnlineApply['m_mobile'],
            'm_email' => $getOnlineApply['m_email'],
            'm_dob' => $getOnlineApply['m_dob'],
            'm_occupation' => $getOnlineApply['m_occupation'],
            'm_nid' => $getOnlineApply['m_nid'],
            'm_birth_certificate' => $getOnlineApply['m_birth_certificate'],
        ]);

        Guardian::create([
            'g_name' => $getOnlineApply['g_name'],
            'student_id' => $studentStore->id,
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

        if($req->email){
            $details = [
                'title' => config('app'),
                'id' => $studentStore->id,
                'name' => $studentStore->name,
            ];
            Mail::to($getOnlineApply['email'])->send(new Confirm($details));
           
        }

        if(siteConfig('admission_sms') == 1){

            $smsData = [];
            $smsData['mobile'] = $getOnlineApply['mobile'];
            $smsData['textbody'] = "Application Approved successfully done!";

            $this->sms($smsData);
        }

        return back();
    }


    public function sms($data)
    {
        $url = "https://sms.solutionsclan.com/api/sms/send";
        $data = [
                "apiKey"=> smsConfig('api_key'),
                "contactNumbers"=> $data['mobile'],
                "senderId"=> smsConfig('sender_id'),
                "textBody"=> $data['textbody']
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = curl_exec($ch);
        echo "$response";
        curl_close($ch);

    }

    /**
     * @param Request $req
     * @return array
     */
    public function getApplyInfo(Request $req): array
    {
        $student = OnlineApply::query()->find($req->get('id'));

        $data = [];
        $data['className'] = $student->classes->name;
        $data['groupName'] = $student->group->name ?? NULL;
        $data['SessionName'] = $student->sessions->year;
        $data['SessionId'] = $student->session_id;
        return $data;
    }



    public function onlineApplyIndex()
    {
        $classes = Classes::query()->get();
        $sessions = Session::query()->get();
        $onlineAdmissions = OnlineAdmission::query()->get();
        $groups = Group::query()->get();
        return view('admin.admission.onlineAdminssion', compact('sessions','classes','groups','onlineAdmissions'));
    }

    public function onlineApplySetStore(Request $req)
    {
    $queryValidation =  OnlineAdmission::query()
                                ->where('class_id', $req->class_id)
                                ->where('session_id', $req->session_id)
                                ->where('group_id', $req->group_id)
                                ->exists();
        if ( $queryValidation){
            return back()->with('status', 'Data Already Taken :)');
        }
        $checkAcademic = AcademicClass::where('session_id', $req->session_id)
                                        ->where('class_id', $req->class_id)
                                        ->where('group_id', $req->group_id)
                                        ->exists();

        if(!$checkAcademic){
            return back()->with('status', 'Your Academic Class Not Match First You Have To Create Acadimic Classes Then Make It. :) ');
        }                                
//        $this->validate($req, $rules, $customMessages);

        OnlineAdmission::create($req->all());
        return back();
    }

    public function load_online_adminsion_id($id)
    {

        $onlineAdmission = OnlineAdmission::find($id);
        $classes = Classes::query()->get();
        $sessions = Session::query()->get();
        $onlineAdmissions = OnlineAdmission::query()->get();
        $groups = Group::query()->get();
        return view('admin.admission.online-admission-edit', compact('onlineAdmission','classes','sessions','groups'));
    }

    public function onlineApplySetUpdate(Request $req)
    {


//       $queryValidation =  OnlineAdmission::query()
//                                ->where('class_id', $req->class_id)
//                                ->where('session_id', $req->session_id)
//                                ->where('group_id', $req->group_id)
//                                ->exists();
//        if ( $queryValidation){
//            return back()->with('status', 'Data Already Taken :)');
//        }


        $dataStore = OnlineAdmission::find($req->id);
        $dataStore->class_id = $req->class_id;
        $dataStore->session_id = $req->session_id;
        $dataStore->group_id = $req->group_id;
        $dataStore->start = $req->start;
        $dataStore->end = $req->end;
        if($req->status == null){
             $dataStore->status = 0;
        }else{
            $dataStore->status = $req->status;
         }
        $dataStore->save();
        return redirect('admin/admission/create');
    }


    function onlineStepDelete($id){
        $dataStore = OnlineAdmission::find($id);
        $dataStore->delete();
        return back();
    }

}
