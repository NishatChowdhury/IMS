<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 12/12/2019
 * Time: 1:23 AM
 */

namespace App\Repository;

use App\Models\Backend\BloodGroup;
use App\Models\Backend\Exam;
use App\Models\Backend\Gender;
use App\Models\Backend\Group;
use App\Models\Backend\Location;
use App\Models\Backend\Religion;
use App\Models\Backend\Session;

class FrontRepository
{
    public function sessions()
    {
        return Session::all()->pluck('year','id');
    }

    public function exams()
    {
        return Exam::all()->pluck('name','id');
    }

    public function genders()
    {
        return Gender::all()->pluck('name', 'id');
    }

    public function bloods()
    {
        return BloodGroup::all()->pluck('name', 'id');
    }

    public function religions()
    {
        return Religion::all()->pluck('name','id');
    }

    public function locations()
    {
        return Location::all()->pluck('name','id');
    }

    public function groups()
    {
        return Group::all()->pluck('name','id');
    }
}
