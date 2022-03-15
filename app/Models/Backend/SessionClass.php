<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class SessionClass extends Model
{
    protected $fillable = ['session_id', 'academic_class_id', 'code', 'group_id', 'section', 'tuition_fee', 'admission_fee', 'admission_form_fee'];

    public function class(){
        return $this->belongsTo('App\Models\Backend\AcademicClass', 'academic_class_id');
    }
    public function group(){
        return $this->belongsTo('App\Models\Backend\Group', 'group_id');
    }
}
