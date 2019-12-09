<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicClass extends Model
{
    protected $table = 'academic_classes';

    protected $fillable = ['name', 'numeric_class'];

    public function students()
    {
        return $this->hasMany(Student::class,'class_id');
    }

    public function subjects()
    {
        return $this->hasMany(AssignSubject::class,'class_id');
    }
}
