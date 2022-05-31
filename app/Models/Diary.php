<?php

namespace App\Models;

use App\Models\Backend\AcademicClass;
use App\Models\Backend\Staff;
use App\Models\Backend\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $guarded;

    function academicClass(){
        return $this->belongsTo(AcademicClass::class);
    }

    function subject(){
         return $this->belongsTo(Subject::class);
    }

    function teacher(){
         return $this->belongsTo(Staff::class,'teacher_id', 'id');
    }
}
