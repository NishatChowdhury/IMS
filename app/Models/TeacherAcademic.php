<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAcademic extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'ac_label_education',
        'ac_degree',
        'ac_major',
        'ac_institute',
        'ac_board',
        'ac_result',
        'ac_year',
        'ac_duration',
        'ac_achievement',
    ];
}
