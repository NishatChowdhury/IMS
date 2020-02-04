<?php

namespace App\Http\Controllers;

use App\FeeSetup;
use App\Student;
use App\Transport;
use Illuminate\Http\Request;
use App\Repository\StudentRepository;

class FinanceController extends Controller
{
    private $repository;
    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $students = Student::query()->where('studentId',$request->studentId)->first();
        if($students){
            $fee_setup = FeeSetup::query()->where('class_id',$students->class_id)->where('session_id',$students->session_id)->where('month',$request->month)->first();
            $transport_fee = Transport::query()->where('student_id',$students->id)->where('status',1)->first();
        }else{
            $fee_setup =[];
            $transport_fee =[];
        }
        return view('admin.account.fee-collection.student-fee',compact('students','fee_setup','transport_fee'));
    }
}
