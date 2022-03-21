<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['id', 'name', 'code', 'short_name', 'level', 'credit_fee','type'];

    public function ass_subject(){
        return $this->hasMany('App\Models\Backend\AssignSubject');
    }
}
