<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;
    protected  $guarded = [];

    function subject(){
        return $this->belongsTo(Subject::class);
    }
    function student(){
        return $this->belongsTo(Student::class);
    }


}
