<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherExperience extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'er_company',
        'er_institute',
        'er_designation',
        'er_experience',
        'er_start',
        'er_end',
        'er_location',
    ];
}
