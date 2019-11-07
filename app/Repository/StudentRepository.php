<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/7/2019
 * Time: 12:16 PM
 */

namespace App\Repository;


use App\AcademicClass;
use App\Group;
use App\Section;

class StudentRepository
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