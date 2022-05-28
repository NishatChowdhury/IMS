<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    protected $fillable = ['academic_class_id','exam_id','subject_id', 'teacher_id', 'date', 'start', 'end', 'objective_full','objective_pass', 'written_full','written_pass', 'practical_full','practical_pass'];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class,'academic_class_id');
    }
    public function academicClassName()
    {
        return $this->belongsTo(AcademicClass::class,'class_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Staff::class);
    }
}
