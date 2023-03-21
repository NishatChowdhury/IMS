<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Staff;
use App\Models\Backend\Student;
use App\Models\Backend\StudentAcademic;
use App\Repository\StudentRepository;
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
        return view('admin.student.studentIdCard', compact('repository'));
    }

    public function generateStudentCard_v1()
    {
        $repository = $this->repository;
        return view('admin.student.designStudentCard_v1', compact('repository'));
    }

    public function generateStudentCard_v2()
    {
        $repository = $this->repository;
        return view('admin.student.designStudentCard_v2', compact('repository'));
    }

    public function generateStudentCard_v3()
    {
        $repository = $this->repository;
        return view('admin.student.designStudentCard_v3', compact('repository'));
    }

    public function generateStudentCard_v4()
    {
        $repository = $this->repository;
        return view('admin.student.designStudentCard_v4', compact('repository'));
    }

    public function staff()
    {
        $repository = $this->repository;
        return view('admin.staff.designCard', compact('repository'));
    }

    public function pdf(Request $request, StudentAcademic $student)
    {
        $std = $student->newquery();

        $std->whereIn('session_id', activeYear());

        if ($request->class) {
            $std->where('class_id', $request->class);
        }
        if ($request->section) {
            $std->where('section_id', $request->section);
        }
        if($request->group_id){
            $std->where('group_id',$request->group);
        }
        if ($request->ranks) {
            $ranks = explode(',', $request->ranks);
            $std->whereIn('rank', $ranks);
        }

        $students = $std->where('status',1)->orderBy('rank')->with('student')->get();

        $card = $request->except('_token');

        return view('admin.student.card-new', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V2(Request $request, StudentAcademic $student)
    {
        $std = $student->newquery();

        //$std->whereIn('session_id', activeYear());

        if ($request->sessions) {
            $std->where('session_id', $request->sessions);
        }
        if ($request->class) {
            $std->where('class_id', $request->class);
        }
        if ($request->section) {
            $std->where('section_id', $request->section);
        }
        if($request->group){
            $std->where('group_id',$request->group);
        }
        if ($request->ranks) {
            $ranks = explode(',', $request->ranks);
            $std->whereIn('rank', $ranks);
        }

        $students = $std->whereHas('student')
            ->where('status',1)
            ->orderBy('rank')
            ->with('student')->get();

        $card = $request->except('_token');

        return view('admin.student.card_karnaphuli', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V3(Request $request, StudentAcademic $student)
    {
        $std = $student->newquery();

        $std->whereIn('session_id', activeYear());

        if ($request->class) {
            $std->where('class_id', $request->class);
        }
        if ($request->section) {
            $std->where('section_id', $request->section);
        }
        if($request->group_id){
            $std->where('group_id',$request->group);
        }
        if ($request->ranks) {
            $ranks = explode(',', $request->ranks);
            $std->whereIn('rank', $ranks);
        }

        $students = $std->orderBy('rank')->with('student')->get();


        $card = $request->except('_token');

        return view('admin.student.card_kingsway', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V4(Request $request, StudentAcademic $student)
    {
        $std = $student->newquery();

        $std->whereIn('session_id', activeYear());

        if ($request->class) {
            $std->where('class_id', $request->class);
        }
        if ($request->section) {
            $std->where('section_id', $request->section);
        }
        if($request->group_id){
            $std->where('group_id',$request->group);
        }
        if ($request->ranks) {
            $ranks = explode(',', $request->ranks);
            $std->whereIn('rank', $ranks);
        }

        $students = $std->orderBy('rank')->with('student')->get();


        $card = $request->except('_token');

        return view('admin.student.card_jalalabad', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }


    public function staffPdf(Request $request)
    {
        if ($request->user == 1) {
            $staffs = Staff::query()->where('staff_type_id', 1)->get();
        } elseif ($request->user == 2) {
            $staffs = Staff::query()->where('staff_type_id', 2)->get();
        } else {
            $staffs = Staff::query()->get();
        }
        $card = $request->except('_token');
        return view('admin.staff.card-new', compact('staffs', 'card'));

        $pdf = PDF::loadView('admin.staff.card');
        $pdf->setPaper('a4', 'portrait');
    }
}
