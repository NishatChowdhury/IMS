<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    protected $table = 'academic_classes';

    protected $fillable = ['name', 'numeric_class'];

//    public function classes(){
//        $this->hasMany('App\SessionClass');
//    }
}
