<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetencyRemark extends Model
{
    use HasFactory;
    protected $fillable = ['academic_class_id','subject_id','student_id','competency_id','indicator_id','remark_id'];

    public function academicClass()
    {
        return $this->belongsTo(AcademicClass::class,'academic_class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function competency()
    {
        return $this->belongsTo(Competency::class);
    }

    public function indicator()
    {
        return $this->belongsTo(Indicator::class);
    }

    public function remark()
    {
        return $this->belongsTo(Remark::class);
    }
}
