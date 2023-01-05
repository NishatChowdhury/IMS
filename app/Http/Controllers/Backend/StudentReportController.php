<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Group;
use App\Models\Backend\Religion;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use Illuminate\Http\Request;

class StudentReportController extends Controller
{
    public function regligionWiseReport(Request $request)
    {
        $religions = Religion::query()->get(['id', 'name']);

        $students = Student::query();

        if ($request->religion_id) {
            $students = $students->where('religion_id', $request->religion_id)->get();
        } else {
            $students = null;
        }

//        $students =  Student::query()->where('religion_id', $request->religion_id)->get();

        return view('admin.admissionReg.religion_report', compact('religions', 'students'));

    }


    public function groupWiseReport(Request $request)
    {
        $groups = Group::query()->get(['id', 'name']);

        if ($request->group_id) {
            $students = StudentAcademic::query()
                ->with('student:id,name,studentId,mobile,address')
                ->where('group_id',$request->group_id )
                ->select(['student_id','group_id'])
                ->get();
        } else {
            $students = null;
        }

        return view('admin.admissionReg.student_group_report', compact('groups', 'students'));

    }

    public function customTable(Request $request)
    {
        $classes = AcademicClass::query()->get();

        $columns = $request->column;
        $arrayCol = explode(',', $columns);

        if ($request->ac_class_id) {

            $students = StudentAcademic::query()
                ->with('student:id,name')->where('academic_class_id', $request->ac_class_id)
                ->get();


        } else {
            $students = null;
        }
        return view('admin.admissionReg.dynamic-table', compact('students','classes', 'arrayCol' ));

    }
}
