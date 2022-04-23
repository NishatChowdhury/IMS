<?php
/**
 * Created by PhpStorm.
 * User: smartrahat
 * Date: 11/9/2019
 * Time: 4:30 PM
 */

namespace App\Repository;

use App\Models\Backend\AcademicClass;

class AttendanceRepository
{
    public function academicClasses()
    {
        return AcademicClass::query()->whereIn('session_id',activeYear())->get();
    }
}
