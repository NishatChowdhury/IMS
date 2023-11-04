<?php

namespace App\Models;

use App\Models\Backend\AcademicClass;
use App\Models\Backend\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultSystem extends Model
{
    use HasFactory;

    protected $fillable = ['academic_class_id','exam_id','subject_id','combined_subject_id','full','pass'];

    function academicClass(){
        return $this->belongsTo(AcademicClass::class);
    }

    function subject(){
         return $this->belongsTo(Subject::class,'subject_id');
    }

    function combinedSubject(){
        return $this->belongsTo(Subject::class,'combined_subject_id');
   }
}
