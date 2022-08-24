<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherTraining extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'tr_title',
        'tr_topic_cover',
        'tr_institute',
        'tr_location',
        'tr_year',
        'tr_start',
        'tr_end',
        'tr_duration',
        'tr_country',
    ];
}
