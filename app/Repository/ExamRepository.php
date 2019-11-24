<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/24/2019
 * Time: 12:34 PM
 */

namespace App\Repository;

use App\AcademicClass;
use App\Group;
use App\Section;

class ExamRepository
{
    public function classes()
    {
        return AcademicClass::all()->pluck('name','id');
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