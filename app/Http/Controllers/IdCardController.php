<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepository;
use App\Staff;
use App\Student;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class IdCardController extends Controller
{
    /**
     * @var StudentRepository
     */
    private $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }

    public function index()
    {
        $repository = $this->repository;
        return view('admin.student.designStudentCard',compact('repository'));
    }

    public function staff()
    {
        $repository = $this->repository;
        return view('admin.staff.designCard',compact('repository'));
    }

    public function pdf(Request $request)
    {
        //dd($request->all());
        $data = Student::query()
            ->where('class_id',$request->class)
            ->where('section_id',$request->section)
            ->take(10)
            ->get();

        $card = $request->all();

//        $total = DB::table('partial_shipments')
//            ->where('lc_id', $request->lc)
//            ->selectRaw('count(*), sum(cont) as conts, sum(qty) as qtys, sum(qty * rate) as lc_values')
//            ->get();

        view()->share('card', (object)$card);
        view()->share('data', $data);
        //view()->share('total', $total);

        $pdf = PDF::loadView('admin.student.card');

        $pdf->setPaper('a4', 'portrait');

        //return $pdf->download('students.pdf'); // to download use download() function
        return $pdf->stream(); // to display use stream() function
    }


    public function staffPdf(Request $request)
    {


        if($request->user == 1){
            $staffs = Staff::query()->where('staff_type_id',1)->get();
        }elseif($request->user == 2){
            $staffs = Staff::query()->where('staff_type_id',2)->get();

        }else{
            $staffs = Staff::query()->get();
        }

        $card = $request->except('_token');
        return view('admin.staff.card',compact('staffs','card'));


//        $total = DB::table('partial_shipments')
//            ->where('lc_id', $request->lc)
//            ->selectRaw('count(*), sum(cont) as conts, sum(qty) as qtys, sum(qty * rate) as lc_values')
//            ->get();

        /*view()->share('card', (object)$card);
        view()->share('staffs', $staffs);*/
        //view()->share('total', $total);

        $pdf = PDF::loadView('admin.staff.card');

        $pdf->setPaper('a4', 'portrait');

        //return $pdf->download('staffs.pdf');
        //return $pdf->stream();

    }
}
