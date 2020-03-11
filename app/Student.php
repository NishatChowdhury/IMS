<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'studentId',
        'academic_class_id',
        'session_id',
        'class_id',
        'section_id',
        'group_id',
        'rank',
        'subject_id',
        'father',
        'mother',
        'gender_id',
        'mobile',
        'dob',
        'blood_group_id',
        'religion_id',
        'image',
        'address',
        'area',
        'zip',
        //'division_id',
        //'state_id',
        'city_id',
        'country_id',
        'email',
        'father_mobile',
        'mother_mobile',
        'notification_type_id',
        'status'
    ];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class,'academic_class_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function payable($id){
        return StudentPayment::where('student_id',$id)->sum('setup_amount');
    }

    public function paid($id){
        return StudentPayment::where('student_id',$id)->sum('paid_amount');
    }

    public function fine($id){
        return StudentPayment::where('student_id',$id)->sum('fine');
    }

    public function discount($id){
        return StudentPayment::where('student_id',$id)->sum('discount');
    }

}
