<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'studentId',
        'session_id',
        'class_id',
        'section_id',
        'group_id',
        'rank',
        'father',
        'mother',
        'gender',
        'mobile',
        'dob',
        'blood_group_id',
        'religion_id',
        'image',
        'address',
        'area',
        'zip',
        'division_id',
        'state_id',
        'country_id',
        'email',
        'father_mobile',
        'mother_mobile',
        'notification_type_id',
        'status'
    ];
}
