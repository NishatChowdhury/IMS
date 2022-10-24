<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\AdmissionMail;
use App\Models\Backend\AppliedStudent;
use App\Models\Backend\City;
use App\Models\Backend\Classes;
use App\Models\Backend\Country;
use App\Models\Backend\Division;
use App\Models\Backend\Group;
use App\Models\Backend\MeritList;
use App\Models\Backend\OnlineAdmission;
use App\Models\Backend\OnlineApply;
use App\Models\Backend\Religion;
use App\Models\Frontend\BloodGroup;
use App\Models\Frontend\Gender;
use App\Repository\FrontRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OnlineApplyController extends Controller
{
    private $repository;

    public function __construct(FrontRepository $repository)
    {
        $this->repository = $repository;
    }
     // school online admission form 
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

    // school online admission form submitted data
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
        //dd($data);
        if ($req->hasFile('pic')){
            $image = time().'.'.$req->file('pic')->getClientOriginalExtension();
            $req->file('pic')->move(storage_path('app/public/uploads/students/'), $image);
            $data = $req->except('pic');
            $data['image'] = $image;
            try{
                $data['password']= uniqid();
                $studentStore = OnlineApply::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }else{
            try{
                $data['password']= uniqid();
                $studentStore = OnlineApply::query()->create($data);
            }catch (\Exception $e){
                dd($e);
            }
        }


        if($req->email){
            $details = [
                'title' => config('app'),
                'id' => $studentStore->password,
                'name' => $studentStore->name,
                'url' => route('download.school.form', $studentStore->password),
            ];
            Mail::to($req->email)->send(new AdmissionMail($details));
           
        }

        if(siteConfig('admission_sms') == 1){

            $smsData = [];
            $smsData['mobile'] = $req->mobile;
            $smsData['id'] = $studentStore->id;
            $smsData['textbody'] = "Application successfully done! Your Application ID-".$studentStore->id. ' & Your Password is '.$studentStore->password;
            $this->sms($smsData);
        }

        return redirect('admission-success-school')->with(['studentStore' => $studentStore]);
        // return back()->with('status','Your Admission Successfully Done Here Your ID ');
    }

    // college online admission validation form 
    public function onlineApplyCollege()
    {
        return view('front.admission.validate-admission');
    }

    // college online admission form 
    public function admissionForm(Request $request)
    {
        $this->validate($request,[
            'ssc_roll' => 'required|numeric|exists:merit_lists'
        ]);

         $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

         $group = MeritList::query()->where('ssc_roll',$request->get('ssc_roll'))->first()->group_id;

        $compulsory = DB::table('online_subjects')
            ->where('type',1)
            ->pluck('name','id');
         $selective = DB::table('online_subjects')
            ->where('type','like','%2%')
            ->where('group_id',$group)
            ->pluck('name','id');
        $optional = DB::table('online_subjects')
            ->where('type','like','%3%')
            ->where('group_id',$group)
            ->pluck('name','id');

        $repository = $this->repository;

        if($student){
            if($student->approved){
                return view('front.admission.admission-block-form',compact('repository','student','compulsory','selective','optional'));
            }
            return view('front.admission.admission-edit-form',compact('repository','student','compulsory','selective','optional'));
        }

        return view('front.admission.admission-form',compact('repository','compulsory','selective','optional'));
    }

    //college online form store
    public function storeCollege(Request $request)
    {
        $this->validate($request,[
            'session_id'=>'required',
            'class_id'=>'required',
            'group_id'=>'required',
            //'studentId'=>'required',
            'ssc_roll'=>'required',
            'name'=>'required',
            'gender_id'=>'required',
            'dob'=>'required',
            'brcn'=>'required',
            'blood_group_id'=>'required',
            'religion_id'=>'required',
            //'preferred_group'=>'required',
            'marital_status'=>'required',
            'nid'=>'required',
            //'location_id'=>'required',
            'father'=>'required',
            'mother'=>'required',
            'guardian_name'=>'required',
            'father_occupation'=>'required',
            'relation_with_guardian'=>'required',
            'yearly_income'=>'required|numeric',
            'total_member'=>'required',
            'guardian_nid'=>'required',
            'mobile'=>'required',
            'email'=>'required|email',
            'guardian_mobile'=>'required',
            'cocurricular'=>'required',
            'hobby'=>'required',
            'quota'=>'required',
            'pre_house_number'=>'required',
            'pre_village'=>'required',
            'pre_road'=>'required',
            'pre_post_office'=>'required',
            'pre_post_code'=>'required',
            'pre_thana'=>'required',
            'pre_district'=>'required',
            'per_house_number'=>'required',
            'per_village'=>'required',
            'per_road'=>'required',
            'per_post_office'=>'required',
            'per_post_code'=>'required',
            'per_thana'=>'required',
            'per_district'=>'required',
            'ssc_board'=>'required',
            'ssc_year'=>'required',
            'ssc_registration'=>'required',
            'ssc_session'=>'required',
            'student_type'=>'required',
            'ssc_gpa'=>'required',
            'ssc_group'=>'required',
            'ssc_school'=>'required',
            //'pic'=>'required',
        ]);

        $data = $request->except('pic','slip');
        $data['status'] = 3;

        if ($request->hasFile('pic')){
            $image = now().'.'.$request->file('pic')->getClientOriginalExtension();
            $request->file('pic')->move(storage_path('app/public/uploads/students/'), $image);
            $data = $request->except('pic');
            $data['image'] = $image;
            $data['status'] = 3;

        }
        if ($request->hasFile('slip')){
            $image = $request->studentId.'.'.$request->file('slip')->getClientOriginalExtension();
            $request->file('slip')->move(storage_path('app/public/uploads/slip/'), $image);
            $data = $request->except('slip');
            $data['bank_slip'] = $image;
            $data['status'] = 3;

        }

        $data['subjects'] = json_encode(
            [
                'compulsory' => [$request->fc,$request->sc,$request->tc],
                'selective' => [$request->fs,$request->ss,$request->ts],
                'optional' => [$request->optional]
            ]
        );

        $student = AppliedStudent::query()->where('ssc_roll',$request->get('ssc_roll'))->first();

        // dd($student->id);

        if($student){
            $student->update($data);
        }else{
            $student = AppliedStudent::query()->create($data);
            if(siteConfig('admission_sms') == 1){
                $smsData = [];
                $smsData['mobile'] = $data['mobile'];
                $smsData['id'] = $student->id;
                $smsData['textbody'] = "Application successfully done! You Application ID-".$student->id;

                $this->sms($smsData);
            }
            // dd($data);
        }

        if($request->email){
            $details = [
                'title' => config('app'),
                'id' => $student->id,
                'name' => $student->name,
                'url' => url('student-form?ssc_roll=').$request->get('ssc_roll'),
            ];
            Mail::to($request->email)->send(new AdmissionMail($details));
           
        }



        return redirect('admission-success')->withErrors(compact('data'));
    }
     // school online admission sms
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
}
