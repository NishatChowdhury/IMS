<?php

namespace App\Http\Controllers;

use App\Repository\StudentRepository;
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

    public function pdf(Request $request)
    {
        //dd($request->all());

        $students = Student::query()->take(10)->get();

//        $total = DB::table('partial_shipments')
//            ->where('lc_id', $request->lc)
//            ->selectRaw('count(*), sum(cont) as conts, sum(qty) as qtys, sum(qty * rate) as lc_values')
//            ->get();

        //view()->share('lc', $lc);
        view()->share('students', $students);
        //view()->share('total', $total);

        $pdf = PDF::loadView('admin.student.pdf');

        $pdf->setPaper('a4', 'portrait');

        return $pdf->download('cards.pdf');
    }
}
