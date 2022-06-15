<?php

namespace App\Models\Backend;

use App\Models\AttendanceStatus;
use Illuminate\Database\Eloquent\Model;

class AttendanceTeacher extends Model
{
    protected $dates = ['date'];
    protected $guarded = [];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
    public function attendanceStatus()
    {
        return $this->belongsTo(AttendanceStatus::class);
    }

}
