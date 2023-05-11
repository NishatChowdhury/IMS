<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['session_id','name','year','start','end','notify'];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function rooms(){
        return $this->hasMany(ExamSeatPlan::class);
    }
}
