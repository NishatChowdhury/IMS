<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicCalender;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Bank;
use App\Models\Backend\Notice;
use App\Models\Backend\Permission;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data =[];

        $data['students'] = Student::query()
            ->whereHas('academics',function($query){
                $query->whereIn('session_id',activeYear());
            })
            ->where('status',1)
            ->count();

        $data['studentMale'] = Student::query()
            ->whereHas('academics',function($query){
                $query->whereIn('session_id',activeYear());
            })
            ->where('status',1)
            ->where('gender_id',1)
            ->count('id');

        $data['studentFemale'] = Student::query()
            ->whereHas('academics',function($query){
                $query->whereIn('session_id',activeYear());
            })
            ->where('status',1)
            ->where('gender_id',2)
            ->count('id');

        $data['teachers'] = Staff::query()->where('staff_type_id',2)->count('id');

        $data['teacherMale'] = Staff::query()->where('staff_type_id',2)->where('gender_id',1)->count('id');

        $data['teacherFemale'] = Staff::query()->where('staff_type_id',2)->where('gender_id',2)->count('id');

        $data['classes'] = AcademicClass::query()->count('id');

        $data['calenders'] = AcademicCalender::query()->where('status',1)->orderBy('start')->paginate(5);

        $data['notices'] = Notice::query()->where('notice_type_id',2)->orderBy('start','desc')->limit(5)->get();


        //dd($data['calenders']);

        return view('admin.dashboard.dashboard')->with($data);
    }
}
