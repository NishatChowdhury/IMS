<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    protected $fillable= ['class_id', 'subject_id', 'teacher_id', 'is_optional', 'objective_pass', 'written_pass', 'practical_pass', 'viva_pass'];

    public function subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }

    public function teacher(){
        return $this->belongsTo('App\Staff', 'teacher_id');
    }
}
