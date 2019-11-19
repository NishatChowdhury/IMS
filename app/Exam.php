<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['name', 'combined_exam_id1', 'combined_exam_id2', 'notify'];
}
