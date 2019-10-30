<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['registration_id','unit_name','user_name','access_date','access_id','department','unit_id','card'];
}
