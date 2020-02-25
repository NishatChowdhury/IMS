<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    protected $fillable = ['academic_class_id','name','subject_id','teacher_id','day_id','start','end'];

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
