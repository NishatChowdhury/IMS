<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    protected $table = 'assign_subjects';
    protected $fillable= ['class_id', 'subject_id', 'teacher_id', 'is_optional', 'objective_pass', 'written_pass', 'practical_pass', 'viva_pass'];

    public function ass_subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }
}
