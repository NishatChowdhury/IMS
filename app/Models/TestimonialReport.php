<?php

namespace App\Models;

use App\Models\Backend\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialReport extends Model
{
    use HasFactory;

    function studentInfo(){
        return $this->belongsTo(Student::class,'student_id','id');
    }
}
