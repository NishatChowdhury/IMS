<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 12/12/2019
 * Time: 1:23 AM
 */

namespace App\Repository;

use App\Exam;
use App\Session;

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
}