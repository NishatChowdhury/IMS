<?php

namespace App\Http\Controllers;

use App\AcademicClass;
use App\Classes;
use App\FeeCategory;
use App\FeePivot;
use App\FeeSetup;
use App\FeeSetupPivot;
use App\Group;
use App\Session;
use App\Student;
use App\StudentAcademic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session as sessions;

class FeeSetupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function index(Request $request)
    {
        $fees = FeeSetup::query()
            ->where('academic_class_id','!=',null)
            ->orderBy('month_id')
            ->get()
            ->groupBy('month_id');


        return view('admin.feeSetup.index',compact('fees'));
    }

    public function create()
    {
        //sessions::forget('fees');
        $academic_classes = AcademicClass::query()->whereIn('session_id',activeYear())->with('academicClasses')->get();
        $classes = Classes::query()->pluck('name','id');
        $session = Session::query()->pluck('year','id');
        $groups = Group::query()->pluck('name','id');
        $fee_category = FeeCategory::query()->pluck('name','id');

        return view('admin.feeSetup.create',compact('session','classes','groups','fee_category','academic_classes'));
    }

    public function store(Request $request){
//        dd($request->all());

        $request->validate([
            'academic_class_id' => [
                'required',
                Rule::unique('fee_setups')->where('month_id',$request->get('month_id'))
            ],
            'month_id' => 'required',
            'year' => 'required',
        ]);

        $students = StudentAcademic::query()
            ->where('academic_class_id',$request->get('academic_class_id'))
            ->get();

        $fees = request()->session()->get('fees');

            foreach($students as $student){
                $feeSetupData = [
                    'academic_class_id' => $request->get('academic_class_id'),
                    'student_id' => $student->student_id,
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

        sessions::forget('fees');

        \Illuminate\Support\Facades\Session::flash('success','Fee added successfully');

        return redirect('admin/fee/fee-setup/view');
    }
    public function feeDetails(Request $request){
        $studentData = StudentAcademic::query()
            ->where('academic_class_id',$request->id)
            ->with('students')
            ->get();
        return view('admin.feeSetup.fee_details',compact('studentData'));
    }

    public function feeSetupDetails(Request $request){
        $fee_setup = FeeSetup::query()
            ->where('student_id',$request->id)
            ->with('feeSetupPivot','student','fee_categories')
            ->get();
        return view('admin.feeSetup.fee_pivot_details',compact('fee_setup'));
    }

    public function edit($id)
    {
        $classes = Classes::query()->pluck('name','id');
        $fee_category = FeeCategory::query()->pluck('name','id');
        $fee_setup = FeeSetup::query()->findOrFail($id);
        $fee_pivot = FeePivot::query()
            ->where('fee_setup_id',$id)
            ->get();

        session()->forget('fees'); // remove existing items from fees session

        foreach ($fee_pivot as $result) {
            $data = [
                'category_id' => $result->fee_category_id,
                'name' => $result->category->name,
                'amount' => $result->amount,
            ];
            if(session()->has('fees')){
                session()->push('fees',$data);
            }else{
                session()->put(['fees'=>[$data]]);
            }
        }

        $fees = session('fees',[]);

        return view('admin.feeSetup.edit',compact('fee_setup','fee_category','classes','fees'));
    }

    /**
     * Update individual students fee
     *
     * @param $id
     * @return RedirectResponse
     */
    public function update($id): RedirectResponse
    {
        $fees = session('fees');

        if(count($fees) > 0){
            FeePivot::query()->where('fee_setup_id',$id)->delete();
            foreach($fees as $fee){
                $data = [
                    'fee_category_id' => $fee['category_id'],
                    'fee_setup_id' => $id,
                    'amount' => $fee['amount'],
                ];
                FeeSetupPivot::query()->create($data);
            }
        }

        \Illuminate\Support\Facades\Session::flash('success','Fee Updated Successfully');

        return redirect()->back();
    }


    public function destroy($id)
    {
        $fee_setup = FeeSetup::query()->findOrFail($id);
        $fee_setup->delete();
        return redirect('admin/fee/fee-setup/view')->with('message','Deleted Successfully!');
    }

  
}
