<?php

namespace App\Http\Controllers;

use App\Classes;
use App\FeeCategory;
use App\FeeSetup;
use App\FeeSetupPivot;
use App\Group;
use App\Session;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FeeSetupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = Classes::query()->pluck('name','id');
        $session = Session::query()->pluck('year','id');
        $groups = Group::query()->pluck('name','id');
        $fee_category = FeeCategory::query()->pluck('name','id');

        return view('admin.feeSetup.feeSetup',compact('session','classes','groups','fee_category'));
    }

    public function feeSetupStore(Request $request){
        $students = Student::query()
            ->where('academic_class_id',$request->get('academic_class_id'))
            ->get();

        $fees = request()->session()->get('fees');

        if(count($fees) > 0){
            foreach($students as $student){
                $feeSetupData = [
                    'academic_class_id' => $request->get('academic_class_id'),
                    'student_id' => $student->id,
                    'month_id' => $request->get('month_id'),
                    'year' => $request->get('year'),
                ];

                $feeSetup = FeeSetup::query()->create($feeSetupData);

                foreach($fees as $fee){
                    $data = [
                        'fee_category_id' => $fee['category_id'],
                        'fee_setup_id' => $feeSetup->id,
                        'amount' => $fee['amount'],
                    ];

                    FeeSetupPivot::query()->create($data);

                }
            }
        }

        \Illuminate\Support\Facades\Session::flash('success','Fee added successfully');

        return redirect()->back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
