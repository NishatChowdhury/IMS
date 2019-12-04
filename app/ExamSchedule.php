<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = ['session_id', 'exam_id', 'class_id', 'subject_id', 'full_marks', 'teacher_id', 'date', 'start', 'end', 'exam_type'];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
