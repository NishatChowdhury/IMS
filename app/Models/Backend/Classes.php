<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $fillable = ['name','numeric_class','grade_id'];

    public function students()
    {
        return $this->hasMany(Student::class,'class_id');
    }

    public function subjects()
    {
        return $this->hasMany(AssignSubject::class,'academic_class_id');
    }

    public function studentAcademic()
    {
        return $this->hasMany(StudentAcademic::class, 'class_id');
    }


}
