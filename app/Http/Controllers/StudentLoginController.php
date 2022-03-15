<?php

namespace App\Http\Controllers;

use App\Models\Backend\RawAttendance;
use App\Models\Backend\Student;
use Carbon\CarbonPeriod;

class StudentLoginController extends Controller
{
//    public function showLoginForm()
//    {
//        return view('student.login');
//    }

    public function profile()
    {
        $id = auth()->guard('student')->user()->student_id;
        $student = Student::query()->findOrFail($id);

        $attendances = RawAttendance::query()
            ->where('registration_id',$student->studentId)
            //->where('access_date','like','%2020-03-01%')
            ->get();

        //$inTime = $attendances->min('access_date');
        //$outTime = $attendances->max('access_date');
        //dd($outTime);

        //$cal = cal_days_in_month(CAL_GREGORIAN,3,2020);
        $period = CarbonPeriod::create('2020-03-01', '2020-03-31')->toArray();
        //dd($period);

        return view('student.profile',compact('student','attendances','period'));
    }
}
