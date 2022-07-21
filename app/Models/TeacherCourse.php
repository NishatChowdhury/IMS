<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherCourse extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'co_title',
        'co_topic_cover',
        'co_institute',
        'co_location',
        'co_year',
        'co_start',
        'co_end',
        'co_result',
        'co_c_no',
        'co_duration',
        'co_country',
    ];
}
