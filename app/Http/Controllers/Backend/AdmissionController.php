<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\AppliedStudent;
use App\Models\Backend\Father;
use App\Models\Backend\Guardian;
use App\Models\Backend\MeritList;
use App\Models\Backend\Mother;
use App\Models\Backend\OnlineAdmission;
use App\Models\Backend\SiteInformation;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\StudentSsc;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * @var StudentRepository
     */
    public $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function store(Request $request)
    {
        $ssc_roll = $request->get('ssc_roll');

        $appliedStudent = AppliedStudent::query()->where('ssc_roll', $ssc_roll)->first();

        $getAcademicClass = AcademicClass::query()
            ->where('session_id', $appliedStudent->session_id)
            ->where('class_id', $appliedStudent->class_id)
            ->where('group_id', $appliedStudent->group_id)
            ->first();

        $data = [
            'name' => $appliedStudent->name,
            'name_bn' => $appliedStudent->name,
            'studentId' => $appliedStudent->studentId,
            'gender_id' => $appliedStudent->gender_id,
            'mobile' => $appliedStudent->mobile,
            'dob' => $appliedStudent->dob,
            'birth_certificate' => $appliedStudent->nid,
            'blood_group_id' => $appliedStudent->blood_group_id,
            'religion_id' => $appliedStudent->religion_id,
            'nationality' => 'Bangladeshi',
            'image' => $appliedStudent->image,
            'address' => $appliedStudent->pre_village . "," .$appliedStudent->pre_post_office,
            'area' => $appliedStudent->pre_district,
            'zip' => $appliedStudent->per_post_code,
            'city_id' => 1,
            'country_id' => 1,
            'email' => $appliedStudent->email,
            'status' => 1,
        ];
        try{
            $student = Student::query()->create($data);
            $appliedStudent->update(['approved' => 1]);

            $admission_sms = SiteInformation::query()->where('admission_confirm_sms',1)->exists();
        }catch (\Exception $e){
            dd($e);
        }

        StudentSsc::create([
            'student_id' => $student->id,
            'board' => $appliedStudent->ssc_board,
            'ssc_session' => $appliedStudent->ssc_session,
            'type' => $appliedStudent->student_type,
            'year' => $appliedStudent->ssc_year,
            'registration' => $appliedStudent->ssc_registration,
            'roll' => $appliedStudent->ssc_roll,
            'gpa' => $appliedStudent->ssc_gpa,
            'group' => $appliedStudent->ssc_group,
            'school' => $appliedStudent->ssc_school,
        ]);


        StudentAcademic::query()->findOrNew($request->sa_id)->updateOrCreate([
            'academic_class_id' => $getAcademicClass->id,
            'student_id' => $student->id,
            'session_id' => $getAcademicClass->session_id,
            'class_id' => $getAcademicClass->class_id,
            'section_id' => $getAcademicClass->section_id,
            'group_id' => $getAcademicClass->group_id,
            'shift_id' => 0,
            'rank' => $student->id
        ]);

        Father::query()->findOrNew($request->f_id)->updateOrCreate([
            'f_name' => $appliedStudent->father,
            'student_id' => $student->id,
            'f_mobile' => $appliedStudent->guardian_mobile,
        ]);

        Mother::query()->findOrNew($request->m_id)->updateOrCreate([
            'm_name' => $appliedStudent->mother,
            'student_id' => $student->id,
            'm_mobile' => $appliedStudent->guardian_mobile,
        ]);

        Guardian::query()->findOrNew($request->g_id)->updateOrCreate([
            'g_name' => $appliedStudent->guardian_name,
            'student_id' => $student->id,
            'g_mobile' => $appliedStudent->guardian_mobile,
        ]);





















        // foreach($rolls as $ssc_roll){
        //     // dd($ssc_roll);
        //     $student = AppliedStudent::query()->where('ssc_roll',$ssc_roll)->first();

        //     $academicClassId = AcademicClass::query()
        //         ->where('session_id',$student->session_id)
        //         ->where('class_id',$student->class_id)
        //         ->where('group_id',$student->group_id)
        //         ->where('section_id',$student->section_id)
        //         ->first();

        //     $optional = json_decode($student->subjects)->optional[0];

        //     $data = [
        //         'name' => $student->name,
        //         'studentId' => $student->studentId,
        //         'academic_class_id' => $academicClassId->id,
        //         'session_id' => $student->session_id,
        //         'class_id' => $student->class_id,
        //         'section_id' => $student->section_id,
        //         'group_id' => $student->group_id,
        //         'rank' => 0,
        //         'subject_id' => $optional,
        //         'father' => $student->father,
        //         'mother' => $student->mother,
        //         'gender_id' => $student->gender_id,
        //         'mobile' => $student->mobile,
        //         'dob' => $student->dob,
        //         'blood_group_id' => $student->blood_group_id,
        //         'religion_id' => $student->religion_id,
        //         'image' => $student->image,
        //         'address' => $student->pre_house_number.', '.$student->pre_road,
        //         'area' => $student->pre_village,
        //         'zip' => $student->pre_post_code,
        //         'city_id' => null,
        //         'country_id' => 1,
        //         'email' => $student->email,
        //         'father_mobile' => $student->guardian_mobile,
        //         'mother_mobile' => null,
        //         'notification_type_id' => null,
        //         'status' => 1,
        //         'bcn' => null,
        //         'father_occupation' => null,
        //         'mother_occupation' => null,
        //         'other_guardian' => null,
        //         'guardian_national_id' => null,
        //         'yearly_income' => null,
        //         'guardian_address' => null,
        //         'bank_slip' => null,
        //         'ssc_roll' => $student->ssc_roll,
        //         'location_id' => $student->location_id,
        //     ];

        //     $isExist = Student::query()->where('ssc_roll',$student->ssc_roll)->exists();

        //     if($isExist){
        //         $s = Student::query()->where('ssc_roll',$student->ssc_roll)->first();
        //         $s->update();
        //     }else{
        //         Student::query()->create($data);
        //         $student->update(['approved'=>1]);
        //         $admission_sms = SiteInformation::query()->where('admission_confirm_sms',1)->exists();
        //     }
        // }

        \Illuminate\Support\Facades\Session::flash('success','Admission completed successfully!');

        return redirect()->back();
    }

  

   

   

    public function browseMeritList(Request $request)
    {

        $s = MeritList::query();

        if($request->has('name') && $request->get('name') != null){
            $s->where('name','like','%'.$request->get('name').'%');
        }

        if($request->has('ssc_roll') && $request->get('ssc_roll') != null){
            $s->where('ssc_roll',$request->get('ssc_roll'));
        }

        if($request->has('group_id') && $request->get('group_id') != null){
            $s->where('group_id',$request->get('group_id'));
        }

        if($request->has('status') && $request->get('status') != null){
            $status = $request->get('status');
            if($status == 0){
                $s->whereDoesntHave('applied');
            }elseif($status == 2){
                $s->whereHas('applied',function($query){
                    $query->where('approved',1);
                });
            }else{
                $s->whereHas('applied',function($query){
                    $query->where('approved',null);
                });
            }
        }

        $applied = AppliedStudent::query()->count();
        $approved = 1;
        // $approved = AppliedStudent::query()->where('approved',1)->count();

        $students = $s->where('status',NULL)->paginate(50);

        $repository = $this->repository;
        return view('admin.admission.browse',compact('students','repository','applied','approved'));
    }

    public function uploadMeritList()
    {
        $onlineApplyStep = OnlineAdmission::query()
            ->where('type', 2)
            ->where('status', 1)
            ->get();

        // $academicClass = AcademicClass::with('classes','sessions','section','group')->get();
        // $sessions = Session::query()->where('active',1)->pluck('year','id');
        // $classes = Classes::query()->pluck('name','id');
        // $groups = Group::query()->pluck('name','id');
        return view('admin.admission.upload',compact('onlineApplyStep'));
    }

    public function upload(Request $request)
    {
        $onlineApplyStep_id = $request->academic_class_id;
        $getOnlineAdmission = OnlineAdmission::findOrFail($onlineApplyStep_id);
        // return $request->all();
        $file = file($request->file('list'));
        $sl = 0;
        foreach($file as $row){
            if($sl != 0){
                $col = explode(',',$row);

                $data['session_id'] = $getOnlineAdmission->session_id;
                $data['class_id'] = $getOnlineAdmission->class_id;
                $data['group_id'] = $getOnlineAdmission->group_id;
                $data['ssc_roll'] = $col[0];
                $data['board'] = $col[1];
                $data['passing_year'] = $col[2];
                $data['name'] = $col[3];
                //$data['status'] = 1;

                $isExist = MeritList::query()
                    ->where('ssc_roll',$data['ssc_roll'])
                    ->first();

                if($isExist){
                    $isExist->update($data);
                }else{
                    MeritList::query()->create($data);
                }
            }
            $sl++;
        }

        \Illuminate\Support\Facades\Session::flash('success','Merit List Uploaded Successfully');

        return redirect()->back();
    }

    public function unapprove($roll)
    {
        //dd($roll);
        //549069
        $student = AppliedStudent::query()->where('ssc_roll',$roll)->first();
        $student->update(['approved'=>null]);
        return redirect()->back();
    }

    public function slipView(Request $request)
    {
        $id = $request->get('id');
        $student = Student::query()->findOrNew($id);
        return view('admin.admission._slip',compact('student'));
    }

    public function sms($data)
    {
        $api_key = smsConfig('api_key');
        $contacts = $data['mobile'];
        $senderid = smsConfig('sender_id');
        //$sms = $request->get('message');
        $sms = 'Congratulation! Your application is approved. Now you are a student of '.siteConfig('title').'. Your student ID is '.$data['studentId'];

        $URL = "http://bangladeshsms.com/smsapi?api_key=".urlencode($api_key)."&type=text&contacts=".urlencode($contacts)."&senderid=".urlencode($senderid)."&msg=".urlencode($sms);

        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/html; charset=UTF-8']);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt ($ch, CURLOPT_URL, $URL);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

    }
}
