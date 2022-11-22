<?php

namespace App\Models\Backend;

use App\Models\AttendanceStatus;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $dates = ['date'];

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class,'registration_id','studentId');
    }

    public function attendanceStatus()
    {
        return $this->belongsTo(AttendanceStatus::class);
    }
    public function studentAcademic()
    {
        return $this->belongsTo(StudentAcademic::class,'student_academic_id','id');
    }

}
