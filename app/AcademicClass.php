<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    protected $fillable = ['name', 'numeric_class'];

    public function classes(){
        $this->hasMany('App\SessionClass');
    }
}
