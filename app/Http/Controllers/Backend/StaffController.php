<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\Gender;
use App\Models\Backend\Shift;
use App\Models\Backend\Staff;
use App\Models\StaffLogin;
use App\Models\TeacherAcademic;
use App\Models\TeacherCourse;
use App\Models\TeacherExperience;
use App\Models\TeacherLogin;
use App\Models\TeacherTraining;
use App\Repository\StaffRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{

    /**
     * @var StaffRepository
     */
    private $repository;

    public function __construct(StaffRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    public function teacher()
    {
        $staffs = Staff::all()->sortBy('code');
        return view ('admin.staff.teacher', compact('staffs'));
    }

    public function addstaff()
    {
        $genders = Gender::all()->pluck('name', 'id');
        $shifts = Shift::query()->pluck('name', 'id');
        $blood_groups = BloodGroup::all()->pluck('name', 'id');
        return view ('admin.staff.addstaff', compact('genders', 'blood_groups','shifts'));
    }

    public function store_staff(Request $req){

        $this->validate($req,[
            'name' => 'required',
            'mobile' => 'required',
            'dob' => 'sometimes|date',
            'gender_id' => 'required',
            'blood_group_id' => 'required',
            'image' => 'sometimes|max:2000',
            //'mail' => 'sometimes|email',
            'code' => 'required',
            'title' => 'required',
            'role_id' => 'required',
            'shift_id' => 'required',
            'job_type_id' => 'required',
            'staff_type_id' => 'required',
            'card_id' => 'required|unique:staffs',
        ]);
        if ($req->hasFile('image')){
            $image = $req->code.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/staffs/', $image);
            $data = $req->except('image');
            $data['image'] = $image;
            //dd($data);
            $staff = Staff::query()->create($data);
            //dd('added');
        }else{
            $staff = Staff::query()->create($req->except('image'));
        }

        // staff academic information store

        if($req->ac_label_education[0] != null){
            foreach ($req->ac_label_education as $key => $item) {
                TeacherAcademic::create([
                    'staff_id' => $staff->id,
                    'ac_label_education' => $req->ac_label_education[$key],
                    'ac_institute' => $req->ac_institute[$key],
                    'ac_board' => $req->ac_board[$key],
                    'ac_degree' => $req->ac_degree[$key],
                    'ac_result' => $req->ac_result[$key],
                    'ac_major' => $req->ac_major[$key],
                    'ac_year' => $req->ac_year[$key],
                    'ac_duration' => $req->ac_duration[$key],
                    'ac_achievement' => $req->ac_achievement[$key],
                ]);
            }

        }
        // staff experience information store
        if($req->er_institute[0] != null){
            foreach ($req->er_institute as $key => $item) {
                TeacherExperience::create([
                    'staff_id' => $staff->id,
                    'er_company' => $req->er_company[$key],
                    'er_institute' => $req->er_institute[$key],
                    'er_designation' => $req->er_designation[$key],
                    'er_start' => $req->er_start[$key],
                    'er_end' => $req->er_end[$key],
                    'er_experience' => $req->er_experience[$key],
                    'er_location' => $req->er_location[$key],
                ]);
            }

        }

        if($req->tr_title[0] != null){
            foreach ($req->tr_title as $key => $item) {
                TeacherTraining::create([
                    'staff_id' => $staff->id,
                    'tr_title' => $req->tr_title[$key],
                    'tr_topic_cover' => $req->tr_topic_cover[$key],
                    'tr_institute' => $req->tr_institute[$key],
                    'tr_location' => $req->tr_location[$key],
                    'tr_year' => $req->tr_year[$key],
                    'tr_start' => $req->tr_start[$key],
                    'tr_end' => $req->tr_end[$key],
                    'tr_duration' => $req->tr_duration[$key],
                    'tr_country' => $req->tr_country[$key],
                ]);
            }

        }
        if($req->co_title[0] != null){
            foreach ($req->co_title as $key => $item) {
                TeacherCourse::create([
                    'staff_id' => $staff->id,
                    'co_title' => $req->co_title[$key],
                    'co_topic_cover' => $req->co_topic_cover[$key],
                    'co_institute' => $req->co_institute[$key],
                    'co_location' => $req->co_location[$key],
                    'co_year' => $req->co_year[$key],
                    'co_start' => $req->co_start[$key],
                    'co_end' => $req->co_end[$key],
                    'co_result' => $req->co_result[$key],
                    'co_c_no' => $req->co_c_no[$key],
                    'co_duration' => $req->co_duration[$key],
                    'co_country' => $req->co_country[$key],
                ]);
            }
        }























        if($staff->staff_type_id == 2){
            TeacherLogin::create([
                'name' => $staff->name,
                'card_no' => $staff->card_id,
                'staff_id' => $staff->id,
                'password' => Hash::make('password'),
            ]);
        }else{
            StaffLogin::create([
                'name' => $staff->name,
                'card_no' => $staff->card_id,
                'staff_id' => $staff->id,
                'password' => Hash::make('password'),
            ]);
        }

        return redirect(route('staff.teacher'))->with('success','Staff Saved Successfully');
    }

    public function edit_staff($id){
        $info = Staff::query()->findOrFail($id);
        $shifts = Shift::query()->pluck('name', 'id');
        $genders = Gender::all()->pluck('name', 'id');
        $blood_groups = BloodGroup::all()->pluck('name', 'id');

        $academic = TeacherAcademic::query()->where('staff_id', $id)->get();
        $experience = TeacherExperience::query()->where('staff_id', $id)->get();
        $training = TeacherTraining::query()->where('staff_id', $id)->get();
        $course = TeacherCourse::query()->where('staff_id', $id)->get();
        return view ('admin.staff.editstaff', compact('genders','training','course','blood_groups','info','shifts','academic','experience'))->with('update',$info);
    }



    public function update_staff(Request $req){
        //dd($req->id);
        $this->validate($req,[
            'name' => 'required',
            'mobile' => 'required',
            'dob' => 'sometimes|date',
            'gender_id' => 'required',
            'blood_group_id' => 'required',
            'image' => 'sometimes|max:2000',
            //'mail' => 'sometimes|email',
            'code' => 'required',
            'shift_id' => 'required',
            'title' => 'required',
            'role_id' => 'required',
            'job_type_id' => 'required',
            'staff_type_id' => 'required',
        ]);
        $staff = Staff::query()->findOrFail($req->id);
        if ($req->hasFile('image')){
            //unlink(public_path('/assets/img/staffs/').$is_exists->image);
            $image = $req->code.'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->move(public_path().'/assets/img/staffs/', $image);
            $data = $req->except('image');
            $data['image'] = $image;
            $staff->update($data);
        }else{
            $staff->update($req->all());
        }

        return redirect(route('staff.teacher'))->with('success','Staff Saved Successfully');
    }

    public function delete_staff($id){
        $is_exists = Staff::query()->findOrFail($id);

        if ($is_exists->image != null){
            unlink(public_path('/assets/img/staffs/'.$is_exists->image));
        }
        $is_exists->delete();
        return redirect(route('staff.teacher'))->with('success','Staff Deleted Successfully');
    }
    public function threshold()
    {
        return view ('admin.staff.threshold');
    }

    public function kpi()
    {
        return view ('admin.staff.kpi');
    }

    public function payslip()
    {
        return view ('admin.staff.payslip');
    }

    public function staffProfile($staffId)
    {
        $staff = Staff::query()->findOrFail($staffId);
        return view('admin.staff.staffProfile',compact('staff'));
    }

    public function store_academic(Request $request)
    {
        $ta = TeacherAcademic::create($request->all());
        return back();
    }
    public function store_experience(Request $request)
    {

        $ta = TeacherExperience::create($request->all());
        return back();
    }
    public function store_training(Request $request)
    {
        $ta = TeacherTraining::create($request->all());
        return back();
    }

    public function staff_training($id)
    {
        return TeacherTraining::find($id);
    }
    public function staff_course($id)
    {
        return TeacherCourse::find($id);
    }
    public function staff_experience($id)
    {
        return TeacherExperience::find($id);
    }
    public function staff_academic($id)
    {
        return TeacherAcademic::find($id);
    }


    public function store_course(Request $request)
    {
        $ta = TeacherCourse::create($request->all());
        return back();
    }

    //update

    public function update_training(Request $request)
    {
        $ta = TeacherTraining::find($request->id);
        $ta->update($request->all());
        return back();
    }
    public function update_course(Request $request)
    {
        $ta = TeacherCourse::find($request->id);
        $ta->update($request->all());
        return back();
    }
    public function update_experience(Request $request)
    {
       $ta = TeacherExperience::find($request->id);
        $ta->update($request->all());
        return back();
    }
    public function update_academic(Request $request)
    {
        $ta = TeacherAcademic::find($request->id);
        $ta->update($request->all());
        return back();
    }



}
