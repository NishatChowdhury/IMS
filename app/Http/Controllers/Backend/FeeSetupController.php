<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AcademicClass;
use App\Models\Backend\Classes;
use App\Models\Backend\FeeCategory;
use App\Models\Backend\FeeSetup;
use App\Models\Backend\FeeSetupCategory;
use App\Models\Backend\FeeSetupStudent;
use App\Models\Backend\Group;
use App\Models\Backend\Session;
use App\Models\Backend\StudentAcademic;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as sessions;
use Illuminate\Validation\Rule;

class FeeSetupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public  function index(Request $request)
    {
        $fees = FeeSetup::query()
            ->where('academic_class_id', '!=', null)
            ->orderBy('month_id')
            ->get()
            ->groupBy('month_id');
        return view('admin.feeSetup.index', compact('fees'));
    }

    public function create()
    {
        $academic_classes = AcademicClass::query()
            ->whereIn('session_id',activeYear())
            ->with('academicClasses')
            ->get();
        $classes = Classes::query()->pluck('name', 'id');
        $session = Session::query()->pluck('year', 'id');
        $groups = Group::query()->pluck('name', 'id');
        $fee_category = FeeCategory::query()->where('status', 1)->pluck('name', 'id');
        sessions::forget('fees');
        return view('admin.feeSetup.create', compact('session', 'classes', 'groups', 'fee_category', 'academic_classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'academic_class_id' => [
                'required',
                Rule::unique('fee_setups')->where('year',$request->get('year'))->where('month_id',$request->get('month_id'))
            ],
            'month_id' => 'required',
            'year' => 'required',
        ]);

        // get selected academic class's students
        $students = StudentAcademic::query()
            ->where('academic_class_id',$request->get('academic_class_id'))
            ->get();
        // get fee categories from session
         $fees = request()->session()->get('fees');
         // sum session amount
        $amount = array_column($fees,'amount');
        $total = intval(array_sum($amount));
        //  dd($total);

        /** store fee setup information start */
        $feeSetupData = [
            'academic_class_id' => $request->get('academic_class_id'),
            'month_id' => $request->get('month_id'),
            'year' => $request->get('year'),
        ];
        $feeSetup = FeeSetup::query()->create($feeSetupData);

        foreach($students as $student){

            $feeSetupStudent = FeeSetupStudent::query()->create(['student_id'=>$student->student_id,'fee_setup_id'=>$feeSetup->id,'amount'=>$total]);
            foreach($fees as $fee){
                $data = [
                    'fee_setup_student_id' => $feeSetupStudent->id,
                    'category_id' => $fee['category_id'],
                    'amount' => $fee['amount']
                ];
                FeeSetupCategory::query()->create($data);
            }
        }

        sessions::forget('fees'); // remove existing items from fees session

        \Illuminate\Support\Facades\Session::flash('success','Fee added successfully');

        return redirect('admin/fee/fee-setup/view');
    }

    /**
     * Get all students for a fee setup
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function feeStudents(Request $request)
    {
        $students = FeeSetupStudent::query()
            ->where('fee_setup_id',$request->id)->with('student')
            ->get();
        return view('admin.feeSetup.fee-students',compact('students'));
    }

    public function feeSetupDetails(Request $request)
    {
        $fee_setup = FeeSetup::query()
            ->where('student_id', $request->id)
            ->with('feeSetupPivot', 'student', 'fee_categories')
            ->get();
        return view('admin.feeSetup.fee_pivot_details', compact('fee_setup'));
    }

    public function edit($id)
    {
        sessions::forget('fees');

        $classes = Classes::query()->pluck('name', 'id');
        $fee_category = FeeCategory::query()->where('status',1)->pluck('name', 'id');
        $fee_setup = FeeSetup::query()->findOrFail($id);
        $fee_setup_student = FeeSetupStudent::query()->where('fee_setup_id',$id)->get();

        foreach ($fee_setup_student as $data){
            $fee_pivot = FeeSetupCategory::query()
                ->where('fee_setup_student_id',$data->id)
                ->get();

            session()->forget('fees'); // remove existing items from fees session

            foreach ($fee_pivot as $result) {
                $data = [
                    'fee_setup_student_id' => $result->fee_setup_student_id,
                    'category_id' => $result->category_id,
                    'amount' => $result->amount,
                    'paid' => $result->paid,
                ];
                if(session()->has('fees')){
                    session()->push('fees',$data);
                }else{
                    session()->put(['fees'=>[$data]]);
                }
            }
        }
        $fees = session('fees');

//        return $fee_setup;
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
        $feeSetup = FeeSetup::query()->findOrFail($id);
        $students = $feeSetup->feeSetupStudent;

        foreach($students as $student){
            $feeSetupCategories = $student->categories;

             foreach ($feeSetupCategories as $category) {
                 $category->delete();
             }

            foreach($fees as $fee)
            {
                $data = [
                    'fee_setup_student_id' => $student->id,
                    'category_id' => $fee['category_id'],
                    'amount' => $fee['amount']
                ];
                FeeSetupCategory::query()->create($data);
            }

            FeeSetupStudent::query()->where('fee_setup_id',$student->fee_setup_id)->update(['amount'=>array_sum(array_column($fees, 'amount')) ]);
        }

        return redirect()->route('fee-setup.index')->with(['message' => 'Fee Updated Successfully']);
    }

    public function editByStudent($id)
    {
        $fee_categories = FeeCategory::query()->where('status',1)->pluck('name', 'id');  /* All Categories are here */
        $feeSetupStudent = FeeSetupStudent::query()->findOrFail($id);

        $categories = $feeSetupStudent->categories;
        sessions::forget('fees'); // remove existing items from fees session
        foreach ($categories as $result) {

            $data = [
                'fee_setup_student_id' => $result->fee_setup_student_id,
                'category_id' => $result->category_id,
                'amount' => $result->amount,
                'paid' => $result->paid,
            ];

            if (session()->has('fees')) {
                session()->push('fees', $data);
            } else {
                session()->put(['fees' => [$data]]);
            }
        }

        return  view('admin.feeSetup.edit_by_student', compact('feeSetupStudent', 'categories', 'fee_categories'));
    }

    public function updateByStudent($id): RedirectResponse
    {
        $fees = session('fees'); /* New stored fees */
        if (isset($fees)) {
            foreach ($fees as $fee) {
                $data = [
                    'fee_setup_student_id' => $id,
                    'category_id' => $fee['category_id'],
                    'amount' => $fee['amount']
                ];
                FeeSetupCategory::query()->updateOrCreate($data);
            }
            FeeSetupStudent::query()->where('id', $id)->update(['amount' => array_sum(array_column($fees, 'amount'))]);
        }
        sessions::forget('fees'); // remove existing items from fees session
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
