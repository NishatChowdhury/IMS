<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 12/9/2019
 * Time: 12:14 PM
 */

namespace App\Repository;

use App\Models\Backend\AcademicClass;
use App\Models\Backend\Classes;
use App\Models\Backend\Exam;
use App\Models\Backend\Group;
use App\Models\Backend\Section;
use App\Models\Backend\Session;

class ResultRepository
{
    public function academicClasses()
    {
        return AcademicClass::query()->whereIn('session_id',activeYear())->get();
    }

    public function sessions()
    {
        return Session::all()->pluck('year','id');
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
}
