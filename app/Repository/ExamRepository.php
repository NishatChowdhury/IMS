<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/24/2019
 * Time: 12:34 PM
 */

namespace App\Repository;

use App\Models\Backend\AcademicClass;
use App\Models\Backend\Classes;
use App\Models\Backend\Exam;
use App\Models\Backend\Group;
use App\Models\Backend\Section;
use App\Models\Backend\Session;

class ExamRepository
{
    public function academicClasses()
    {
        return AcademicClass::query()->whereIn('session_id',activeYear())->get();
    }

    public function exams()
    {
        return Exam::all()->pluck('name','id');
    }

    public function classes()
    {
        return Classes::all()->pluck('name','id');
    }

    public function sections()
    {
        return Section::all()->pluck('name','id');
    }

    public function groups()
    {
        return Group::all()->pluck('name','id');
    }

    public function sessions()
    {
        return Session::where('active', 1)->pluck('year','id');
    }
}
