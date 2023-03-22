<?php

namespace Modules\HRM\Http\Controllers;

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
        return view('hrm::student.studentIdCard', compact('repository'));
    }

    public function generateStudentCard_v1()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v1', compact('repository'));
    }

    public function generateStudentCard_v2()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v2', compact('repository'));
    }

    public function generateStudentCard_v3()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v3', compact('repository'));
    }
    public function generateStudentCard_v4()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v4', compact('repository'));
    }

    public function generateStudentCard_v5()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v5', compact('repository'));

    } 
    
    public function generateStudentCard_v6()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v6', compact('repository'));
    }

    public function generateStudentCard_v7()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v7', compact('repository'));
    }

    public function generateStudentCard_v8()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v8', compact('repository'));
    }
    public function generateStudentCard_v9()
    {
        $repository = $this->repository;
        return view('hrm::student.designStudentCard_v9', compact('repository'));
    }

    public function staff()
    {
        $repository = $this->repository;
        return view('hrm::staff.designCard', compact('repository'));
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

        return view('hrm::student.pdf_v1', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a3', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V2(Request $request, StudentAcademic $student)
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

        return view('hrm::student.pdf_v2', compact('students', 'card'));

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
        $students = $std->where('status',1)->orderBy('rank')->with('student')->get();
        $card = $request->except('_token');

        return view('hrm::student.pdf_v3', compact('students', 'card'));

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
        $students = $std->where('status',1)->orderBy('rank')->with('student')->get();
        $card = $request->except('_token');

        return view('hrm::student.pdf_v4', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V5(Request $request, StudentAcademic $student)
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

        return view('hrm::student.pdf_v5', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V6(Request $request, StudentAcademic $student)
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

        return view('hrm::student.pdf_v6', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V7(Request $request, StudentAcademic $student)
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

        return view('hrm::student.pdf_v7', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function pdf_V8(Request $request, StudentAcademic $student)
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

        return view('hrm::student.pdf_v8', compact('students', 'card'));

        view()->share('card', (object)$card);
        view()->share('data', $data);
        $pdf = PDF::loadView('admin.student.card');
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }    public function pdf_V9(Request $request, StudentAcademic $student)
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

        return view('hrm::student.pdf_v9', compact('students', 'card'));

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
        return view('hrm::staff.card-new', compact('staffs', 'card'));

        $pdf = PDF::loadView('admin.staff.card');
        $pdf->setPaper('a4', 'portrait');
    }
}