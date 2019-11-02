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
        //'division_id',
        'state_id',
        'country_id',
        'email',
        'father_mobile',
        'mother_mobile',
        'notification_type_id',
        'status'
    ];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class,'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
