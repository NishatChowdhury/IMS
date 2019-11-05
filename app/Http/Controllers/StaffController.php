<?php

namespace App\Http\Controllers;

use App\BloodGroup;
use App\Gender;
use App\Repository\StaffRepository;
use App\Staff;
use Illuminate\Http\Request;

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
        $staffs = Staff::all();
        return view ('admin.staff.teacher', compact('staffs'));
    }

    public function addstaff()
    {
        $genders = Gender::all()->pluck('name', 'id');
        $blood_groups = BloodGroup::all()->pluck('name', 'id');
        return view ('admin.staff.addstaff', compact('genders', 'blood_groups'));
    }

    public function store_staff(Request $request){
        //dd($request->all());

        if ($request->hasFile('image')){
            $image = $request->code.'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path().'/assets/img/staffs/', $image);
            $data = $request->except('image');
            $data['image'] = $image;
            Student::query()->create($data);
        }else{
            Student::query()->create($request->all());
        }

        return redirect('stu_add')->with('success','Student Added Successfully');
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

}
