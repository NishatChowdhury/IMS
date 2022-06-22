<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    protected $table = 'assign_subjects';

    protected $fillable= [
        'academic_class_id',
        'subject_id',
        'class_id',
        'teacher_id',
        'is_optional',
        //'objective_pass',
        //'written_pass',
        //'practical_pass',
        //'viva_pass'
    ];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    function academicClass(){
        return $this->belongsTo(AcademicClass::class);
    }
}
