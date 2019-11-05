<?php

namespace App\Http\Controllers;

use App\Repository\StaffRepository;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * @var StaffRepository
     */
    private $repository;

    public function __construct(StaffRepository $repository)
    {
        $this->middleware('auth');
        $this->repository = $repository;
    }
    public function teacher()
    {
        return view ('admin.staff.teacher');
    }

    public function addstaff()
    {
        return view ('admin.staff.addstaff');
    }

    public function threshold()
    {
        return view ('admin.staff.threshold');
    }

    public function kpi()
    {
        return view ('admin.staff.kpi');
    }

    public function payslip()
    {
        return view ('admin.staff.payslip');
    }

}
