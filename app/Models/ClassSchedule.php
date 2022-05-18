<?php

namespace App\Models;

use App\Models\Backend\Staff;
use App\Models\Backend\Subject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    function subject(){
        return $this->belongsTo(Subject::class);
    }
    function teacher(){
        return $this->belongsTo(Staff::class,'teacher_id', 'id');
    }
}
