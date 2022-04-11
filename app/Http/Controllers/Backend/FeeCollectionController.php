<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\AcademicClass;
use App\Models\Backend\Student;
use App\Models\Backend\FeeSetup;
use App\Models\Backend\FeeSetupCategory;
use App\Models\Backend\FeeSetupStudent;
use App\Models\Backend\StudentPayment;
use App\Models\Backend\StudentAcademic;
use App\Models\Backend\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Backend\Month;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

// use Barryvdh\DomPDF\Facade\Pdf;
use PDF;

class FeeCollectionController extends Controller
{
    public function index()
    {
        return view('admin.feeCollection.index');
    }

    public function view(Request $request)
    {
        Session::forget(['receipt','spay']);
        $payment_method = DB::table('payment_methods')->pluck('name', 'id');
        $term = $request->term;
        $student = Student::query()->where('studentId', $term)->with('academics')->first();
        // dd($student);
        $paidAmount = StudentPayment::query()->where('student_academic_id', $student->academics[0]->id)
            ->selectRaw('year(date) as year, monthname(date) as month, sum(amount) as amount')
            ->groupBy('year', 'month')
            ->get();
        $fss = FeeSetupStudent::where('student_id', $student->id)->get();
        $amount = 0;
        $paid = $paidAmount[0]->amount ?? 0;
        foreach ($fss as $fs) {
            $amount += $fs->amount;
        }
        $totalDue = $amount - $paid;

        $previousPayment = StudentPayment::query()->where('student_academic_id', $student->academics[0]->id)->latest()->get();

        if (!empty($student->studentId) && $student->studentId == $term) {
             $feeSetup = [];
            return view('admin.feeCollection.view', compact('feeSetup','student', 'term', 'payment_method', 'totalDue', 'paidAmount', 'previousPayment'));
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
        // return $request->all();
        $ss =  StudentAcademic::where('student_id', $request->student_id)->first();
        $feeSetupID = FeeSetup::where('academic_class_id', $ss->academic_class_id)->first();

        $fss = FeeSetupStudent::where('student_id', $request->student_id)->get(['id', 'student_id']);

        if ($request->amount && $request->discount) {
            $paying = $request->amount + $request->discount;
        } else {
            $paying = $request->amount;
        }
        // $paying = $request->amount;
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
                        $adjust = $paid + $paying;
                        $category->update(['paid' => $adjust]);
                        $paying = 0;
                    }
                }
            }
        }

        $sp = StudentPayment::query()->create([
            'user_id' => Auth::user()->id,
            'student_academic_id' => $ss->id,
            'fee_setup_id' => $feeSetupID->id,
            'date' => $request->date,
            'amount' => $request->amount,
            'discount' => $request->discount,
            'remarks' => $request->remarks,
            'payment_method' => $request->payment_method
        ]);

        $receipt =  FeeSetupCategory::query()->where('fee_setup_student_id', $fss->first()->id)->get();
        return redirect('admin/fee/fee-collection')
            ->with('receipt', $receipt)
            ->with('spay', $sp);
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
        Session::forget('request1'); //forget session data when first load page
        if ($request->from != null && $request->to != null && $request->academic_class != null) {
            $stupays = $stupays->whereDate('date', '>=', $request->from)->whereDate('date', '<=', $request->to)->whereHas('feeSetup', function ($q) use ($ac) {
                return  $q->where('academic_class_id', $ac);
            })->get();
        } elseif ($request->from != null && $request->to != null) {
            $stupays =  $stupays->whereDate('date', '>=', $request->from)->whereDate('date', '<=', $request->to)->get();
        } elseif ($request->from != null) {
            $stupays =  $stupays->whereDate('date', $request->from)->get();
        } elseif ($request->to != null) {
            $stupays = $stupays->whereDate('date', $request->to)->get();
        } elseif ($request->academic_class != null) {
            $stupays = $stupays->whereHas('feeSetup', function ($q) use ($ac) {
                return  $q->where('academic_class_id', $ac);
            })->get();
        } else {
            $stupays = null;
        }

        Session::put('request1',['class'=>$request->academic_class,'from'=>$request->from, 'to'=>$request->to]);
        return view('admin.feeCollection.report_generate', compact('stupays', 'academic_class'));
    }

    public function academicClassReport(Request $request)
    {
        $academic_class = AcademicClass::get();
        $reqMonth = Month::all()->pluck('id', 'name');
        Session::forget('request');
        // $this->validate($request,[
        //     'academic_class'=>'required',
        //     'month_id'=>'required',
        //     'year_id'=>'required'
        // ]);
        $students = Student::query();

        if ($request->academic_class != null && $request->month_id != null && $request->year_id != null) {
            $students = $students->whereHas('academics', function ($query) use ($request) {
                $query->where('academic_class_id', $request->academic_class);
            }) ->whereHas('feeSetupStudents.feeSetup', function ($query) use ($request) {
                    $query->where('month_id', $request->month_id)->where('year', $request->year_id);
                })->get();
        } else {
            $students = null;
        }

        Session::put('request',['class'=>$request->academic_class,'month'=>$request->month_id, 'year'=>$request->year_id]);

        // return $students;

        return view('admin.feeCollection.academic_class_report', compact('academic_class',  'reqMonth', 'students'));
    }

    public function pdfClassReport(Request $request)
    {
        $r = Session::get('request');
       // dd($r['class']);

        $students = Student::whereHas('academics', function ($query) use ($r) {
            $query->where('academic_class_id', $r['class']);
        }) ->whereHas('feeSetupStudents.feeSetup', function ($query) use ($r) {
            $query->where('month_id',  $r['month'])->where('year',$r['year']);
        })->get();

        $pdf = PDF::loadView('admin.feeCollection.pdf_class', compact('students'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('invoice.pdf');

    }
    public function pdfDateReport(Request $request)
    {
        $r = Session::get('request1');
//       dd($r['from']);

         $stupays = StudentPayment::query();
        if ( $r['from']   &&  $r['to'] && $r['class'] ) {
            $stupays = $stupays->whereDate('date', '>=', $r['from'] )->whereDate('date', '<=', $r['to'] )->whereHas('feeSetup', function ($q) use ($r ) {
                return  $q->where('academic_class_id', $r['class'] );
            })->get();
        } elseif ($r['from']   &&  $r['to']) {
            $stupays = $stupays->whereDate('date', '>=', $r['from'] )->whereDate('date', '<=', $r['to'] )->get();
        } elseif ($r['from']  ) {
            $stupays = $stupays->whereDate('date',  $r['from'] )->get();
        } elseif ($r['to'] ) {
            $stupays = $stupays->whereDate('date',  $r['to'] )->get();
        } elseif ($r['class']) {
            $stupays = $stupays->whereHas('feeSetup', function ($q) use ($r ) {
                return  $q->where('academic_class_id', $r['class'] );
            })->get();
        } else {
            $stupays = null;
        }

        $pdf = PDF::loadView('admin.feeCollection.pdf_date_search_report', compact('stupays'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('Date-search-report.pdf');

    }



}
