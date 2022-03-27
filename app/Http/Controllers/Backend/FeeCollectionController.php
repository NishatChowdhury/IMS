<?php

namespace App\Http\Controllers\Backend;

use App\AcademicClass;
use App\Student;
use App\FeeSetup;
use App\FeeSetupCategory;
use App\FeeSetupStudent;
use App\StudentPayment;
use App\StudentAcademic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Month;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\Facade\Pdf;

class FeeCollectionController extends Controller
{
    public function index()
    {
        return view('admin.feeCollection.index');
    }

    public function view(Request $request)
    {
        $payment_method = DB::table('payment_methods')->pluck('name', 'id');
        $term = $request->term;
        $student = Student::query()->where('studentId', $term)->with('academics')->first();
        $paidAmount = StudentPayment::where('student_id', $student->id)->selectRaw('year(date) as year, monthname(date) as month, sum(amount) as amount')
            ->groupBy('year', 'month')
            ->get();
        $fss = FeeSetupStudent::where('student_id', $student->id)->get(['id', 'student_id']); //dd($fss);
        $amount = 0;
        $paid = 0;
        foreach ($fss as $fs) {
            $amount += FeeSetupCategory::where('fee_setup_student_id', $fs->id)->sum('amount');
            $paid += FeeSetupCategory::where('fee_setup_student_id', $fs->id)->sum('paid');
        }
        $totalDue = $amount - $paid;
        // dd($amount);
        $previousPayment = StudentPayment::where('student_id', $student->id)->latest()->get();

        if (!empty($student->studentId) && $student->studentId == $term) {
            // $feeSetup = $student->feeSetup;
            return view('admin.feeCollection.view', compact('student', 'term', 'payment_method', 'totalDue', 'paidAmount', 'previousPayment'));
        } else {
            return view('admin.feeCollection.index')->with('message', 'IT WORKS!');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'payment_method' => 'required',
            'amount' => 'required'
        ]);
        //   return $request->all();
        $ss =  StudentAcademic::where('student_id', $request->student_id)->first();
        $feeSetupID = FeeSetup::where('academic_class_id', $ss->academic_class_id)->first();

        $fss = FeeSetupStudent::where('student_id', $request->student_id)->get(['id', 'student_id']);  dd( $fss);
        $paying = $request->amount;
        foreach ($fss as $fs) {
            $categories = FeeSetupCategory::query()->where('fee_setup_student_id', $fs->id)->get();

            foreach ($categories as $category) {
                $amount = $category->amount;
                $paid = $category->paid;
                if ($amount > $paid) {
                    $due = $amount - $paid;
                    if ($paying > $due) {
                        $category->update(['paid' => $amount]);
                        $paying = $paying - $due;
                    } else {
                        $category->update(['paid' => $paying]);
                        $paying = 0;
                    }
                }
            }
        }

        $sp = StudentPayment::query()->create([
            'user_id' => Auth::user()->id,
            'student_id' => $request->student_id,
            'fee_setup_id' => $feeSetupID->id,
            'date' => $request->date,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method
        ]);

        return redirect('admin/fee/fee-collection')->with('message', 'Added Successfully!');
    }

    public function allCollections()
    {
        $studentPayment = StudentPayment::all();
        return view('admin.feeCollection.collection', compact('studentPayment'));
    }

    public function report($id)
    {
        $student = Student::query()->where('id', $id)->first();
        if ($student) {
            $fee_setup = FeeSetup::query()
                ->where('student_id', $student->id)->with('feeSetupPivot')
                ->first();
            $payment_details = StudentPayment::query()
                ->where('student_id', $student->id)
                ->orderBy('created_at')
                ->get();
        } else {
            $fee_setup = [];
            $transport_fee = [];
            $payment_details = [];
        }
        return view('admin.feeCollection.report', compact('student', 'fee_setup', 'payment_details'));
    }


    public function reportGenerate(Request $request)
    {

        $academic_class = AcademicClass::get();

        $stupays = StudentPayment::query();
        $ac = $request->academic_class;

        if ($request->from != null && $request->to != null && $request->academic_class != null) {
            $stupays = $stupays->where('date', '>=', $request->from)->where('date', '<=', $request->to)->whereHas('feeSetup', function ($q) use ($ac) {
                return  $q->where('academic_class_id', $ac);
            })->get();
        } elseif ($request->from != null && $request->to != null) {
            $stupays =  $stupays->where('date', '>=', $request->from)->where('date', '<=', $request->to)->get();
        } elseif ($request->from != null) {
            $from = $request->from;
            $stupays =  $stupays->where('date', $from)->get();
        } elseif ($request->to != null) {
            $stupays = $stupays->where('date', $request->to)->get();
        } elseif ($request->academic_class != null) {
            $stupays = $stupays->whereHas('feeSetup', function ($q) use ($ac) {
                return  $q->where('academic_class_id', $ac);
            })->get();
        } else {
            $stupays = null;
        }



        return view('admin.feeCollection.report_generate', compact('stupays', 'academic_class'));
    }

    public function academicClassReport(Request $request)
    {
        $academic_class = AcademicClass::get();
        $reqMonth = Month::all()->pluck('id', 'name');

        $this->validate($request,[
            'academic_class'=>'required',
            'month_id'=>'required',
            'year_id'=>'required'
        ]);

            $students = Student::query()
            ->whereHas('academics',function($query)use($request){
                $query->where('academic_class_id',$request->academic_class);
            })
            ->get();

        return view('admin.feeCollection.academic_class_report', compact('academic_class',  'reqMonth', 'students'));
    }


}
