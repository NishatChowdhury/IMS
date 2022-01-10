<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\StudentPayment;
use Illuminate\Support\Facades\DB;

class FeeCollectionController extends Controller
{
    public function index(){
        return view('admin.feeCollection.index');
    }

    public function view(Request $request){
        $user = auth()->user();
        $payment_method = DB::table('payment_methods')->pluck('name');
        $term = $request->term;
        $student = Student::query()->where('studentId',$term)->first();

        if(!empty($student->studentId) && $student->studentId == $term){
            $feeSetup = $student->feeSetup;
            return view('admin.feeCollection.view',compact('student','feeSetup','term','payment_method','user'));
        }
        else{
            return view('admin.feeCollection.index')->with('message', 'IT WORKS!');
        }
    }

    public function store(Request $request){
        StudentPayment::query()->create($request->all());
        return redirect('admin/fee/fee-collection')->with('message','Added Successfully!');
    }

}
