<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SessionClass extends Model
{
    protected $fillable = ['session_id', 'academic_class_id', 'code', 'group_id', 'section_name', 'tuition_fee', 'admission_fee', 'admission_form_fee'];

    public function class(){
        return $this->belongsTo('App\AcademicClass');
    }
}
