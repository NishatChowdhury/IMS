<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\BloodGroup;
use App\Models\Backend\Gender;
use App\Models\Backend\Shift;
use App\Models\Backend\Staff;
use App\Models\StaffLogin;
use App\Models\TeacherLogin;
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
//        dd($req->all());
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
        return view ('admin.staff.editstaff', compact('genders', 'blood_groups','info','shifts'))->with('update',$info);
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

}
