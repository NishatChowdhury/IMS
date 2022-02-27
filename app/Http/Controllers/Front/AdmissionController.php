<?php

namespace App\Http\Controllers\Front;

use App\Session;
use App\MeritList;
use App\OnlineApply;
use App\AppliedStudent;
use App\SiteInformation;
use App\Mail\AdmissionMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repository\FrontRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdmissionController extends Controller
{
    private $repository;

    public function __construct(FrontRepository $repository)
    {
        $this->repository = $repository;
    }
    // public function validateAdmission()
    // {
    //     return view('front.admission.validate-admission');
    // }

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


    // college admission data store
    public function store(Request $request)
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
            $request->file('pic')->move(public_path().'/assets/img/students/', $image);
            $data = $request->except('pic');
            $data['image'] = $image;
            $data['status'] = 3;
//            try{
//                Student::query()->create($data);
//            }catch (\Exception $e){
//                dd($e);
//            }
        }
        if ($request->hasFile('slip')){
            $image = $request->studentId.'.'.$request->file('slip')->getClientOriginalExtension();
            $request->file('slip')->move(public_path().'/assets/img/slip/', $image);
            $data = $request->except('slip');
            $data['bank_slip'] = $image;
            $data['status'] = 3;
//            try{
//                Student::query()->create($data);
//            }catch (\Exception $e){
//                dd($e);
//            }
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

                $this->sms($smsData);
            }
            // dd($data);
        }

        if($request->email){
            $details = [
                'title' => config('app'),
                'id' => $student->id,
                'name' => $student->name,
                'url' => 'sd',
                // 'url' => route('download.school.form', $student->id),
            ];
            Mail::to($request->email)->send(new AdmissionMail($details));
           
        }

        // if(siteConfig('admission_sms') == 1){

        //         $url = "https://sms.solutionsclan.com/api/sms/send";
        //         $data = [
        //                 "apiKey"=> smsConfig('api_key'),
        //                 "contactNumbers"=> $request->mobile,
        //                 "senderId"=> smsConfig('sender_id'),
        //                 "textBody"=> "Application successfully done! You Application ID-".$student->id
        //         ];
        
        //         $ch = curl_init();
        //         curl_setopt($ch, CURLOPT_URL, $url);
        //         curl_setopt($ch, CURLOPT_POST, 1);
        //         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //         curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        //         $response = curl_exec($ch);
        //         echo "$response";
        //         curl_close($ch);
        // }

        return redirect('admission-success')->withErrors(compact('data'));
    }

    public function loadStudentId(Request $request){
        $academicYear = substr(trim(Session::query()->where('id',$request->academicYear)->first()->year),-2);

        $prefix = substr($request->get('groups'),0,1);

        $incrementId = AppliedStudent::query()->max('id');
        $increment = $incrementId + 1;

        $studentId = $prefix.$academicYear.$increment;
        return $studentId;
    }


    public function studentView(Request $request)
    {
        $roll = $request->get('roll');
        $student = AppliedStudent::query()->where('ssc_roll',$roll)->first();

        if(!$student){
            return response('<h3 class="text-danger text-center">Student not found in <b>Applied Student</b> database!</h3>');
            //abort(404,'Student not found in applied database!');
        }

        $subjects = json_decode($student->subjects);

        return view('admin.admission._student-view',compact('student','subjects'));
    }

    public function sms($data)
    {
        $url = "https://sms.solutionsclan.com/api/sms/send";
                $data = [
                        "apiKey"=> smsConfig('api_key'),
                        "contactNumbers"=>  $data['mobile'],
                        "senderId"=> smsConfig('sender_id'),
                        "textBody"=> "Application successfully done! You Application ID-".$data['id']
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


    public function downloadSchoolPdf($id = null)
    {

       $getData =  OnlineApply::find($id);
       if(empty($getData)){
            return back()->with('status', 'Your Application ID Not Match :)');
       }
        return view('front.admission-school.form-pdf', compact('getData'));
    }
}
