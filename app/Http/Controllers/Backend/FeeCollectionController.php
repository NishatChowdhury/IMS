<?php

namespace App\Http\Controllers\Backend;

use App\Student;
use App\FeeSetup;
use App\StudentPayment;
use App\StudentAcademic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FeeCollectionController extends Controller
{
    public function index(){
        return view('admin.feeCollection.index');
    }

    public function view(Request $request)
    {
        $payment_method = DB::table('payment_methods')->pluck('name');
        $term = $request->term;
        $student = Student::query()->where('studentId',$term)->with('academics')->first();
        // $paidAmount = DB::table('student_payments')->select('select  month(date) as month, sum(amount) as total_amount')->groupBy('month')->get();
        // return $paidAmount;
        // dd($paidAmount);
        return StudentPayment::select(
            DB::raw('sum(amount) as `amount`'),
            DB::raw("date as month")
        )->groupBy('month')->get();
        if(!empty($student->studentId) && $student->studentId == $term){
        // $feeSetup = $student->feeSetup;
            return view('admin.feeCollection.view',compact('student','term','payment_method'));
        }else{
            return view('admin.feeCollection.index')->with('message', 'IT WORKS!');
        }
    }

    public function store(Request $request)
    {
      
        $ss =  StudentAcademic::where('student_id', $request->student_id)->first();
        // dd($ss);
        $academicClassID = $ss->academic_class_id;
        $feeSetupID = FeeSetup::where('academic_class_id', $academicClassID)->first();
    
        StudentPayment::query()->create([
            'user_id' => Auth::user()->id,
            'student_id' => $request->student_id,
            'fee_setup_id' => $feeSetupID->id,
            'date' => $request->date,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method
        ]);
        return redirect('admin/fee/fee-collection')->with('message','Added Successfully!');
    }

    public function allCollections(){
        $studentPayment = StudentPayment::all();
        return view('admin.feeCollection.collection',compact('studentPayment'));
    }

    public function report($id)
    {
        $student = Student::query()->where('id',$id)->first();
        if($student){
            $fee_setup = FeeSetup::query()
                ->where('student_id',$student->id)->with('feeSetupPivot')
                ->first();
            $payment_details = StudentPayment::query()
                ->where('student_id',$student->id)
                ->orderBy('created_at')
                ->get();
        }else{
            $fee_setup =[];
            $transport_fee =[];
            $payment_details =[];
        }
        return view('admin.feeCollection.report',compact('student','fee_setup','payment_details'));
    }

}
