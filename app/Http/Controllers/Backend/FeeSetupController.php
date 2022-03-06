<?php

namespace App\Http\Controllers\Backend;

use App\FeeSetupCategory;
use App\FeeSetupStudent;
use App\Group;
use App\Classes;
use App\Session;
use App\FeeSetup;
use App\FeeCategory;
use App\AcademicClass;
use App\StudentAcademic;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
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
        $academic_classes = AcademicClass::query()
            ->whereIn('session_id',activeYear())
            ->with('academicClasses')
            ->get();

        $classes = Classes::query()->pluck('name','id');
        $session = Session::query()->pluck('year','id');
        $groups = Group::query()->pluck('name','id');
        $fee_category = FeeCategory::query()->pluck('name','id');

        return view('admin.feeSetup.create',compact('session','classes','groups','fee_category','academic_classes'));
    }

    public function store(Request $request){
        $request->validate([
            'academic_class_id' => [
                'required',
                Rule::unique('fee_setups')->where('month_id',$request->get('month_id'))
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

        /** store fee setup information start */
        $feeSetupData = [
            'academic_class_id' => $request->get('academic_class_id'),
            'month_id' => $request->get('month_id'),
            'year' => $request->get('year'),
        ];
        $feeSetup = FeeSetup::query()->create($feeSetupData);
        /** store fee setup information end */

        foreach($students as $student){
            $feeSetupStudent = FeeSetupStudent::query()->create(['student_id'=>$student->id,'fee_setup_id'=>$feeSetup->id]);
            foreach($fees as $fee){
                $data = [
                    'fee_setup_student_id' => $feeSetupStudent->id,
                    'category_id' => $fee['category_id'],
                    'amount' => $fee['amount']
                ];
                FeeSetupCategory::query()->create($data);
            }
        }

        sessions::forget('fees');

        \Illuminate\Support\Facades\Session::flash('success','Fee added successfully');

        return redirect('admin/fee/fee-setup/view');
    }

    /**
     * Get all students for a fee setup
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function feeStudents(Request $request){
        $students = FeeSetupStudent::query()
            ->where('fee_setup_id',$request->id)
            ->get();
        return view('admin.feeSetup.fee-students',compact('students'));
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

            foreach ($feeSetupCategories as $category){
                $category->delete();
            }

            foreach($fees as $fee){
                $data = [
                    'fee_setup_student_id' => $student->id,
                    'category_id' => $fee['category_id'],
                    'amount' => $fee['amount']
                ];
                FeeSetupCategory::query()->create($data);
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
