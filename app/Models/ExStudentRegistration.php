<?php

namespace App\Models;

use App\Models\Backend\BloodGroup;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExStudentRegistration extends Model
{
    use HasFactory;

    protected $fillable = ['student_name','father','mother','email','present_address','permanent_address','passing_year','mobile','blood_group','profession','image'];

    function bloodGroup(){
        return $this->belongsTo(BloodGroup::class,'blood_group');
    }

}


