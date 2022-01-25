<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAcademic extends Model
{
    use HasFactory;

    protected $guarded = [];


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

}
