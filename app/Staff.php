<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staffs';

    protected $fillable = ['name','father_husband','mobile','dob','nid','gender_id','blood_group_id','image','mail','code','title','role_id','job_type_id','staff_type_id','joining','salary','bonus'];
}
