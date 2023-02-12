<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['academic_class_id','exam_id','subject_id','student_id','full_mark','objective','written','practical','viva',
                            'total_mark','gpa','grade','grade_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
    public function studentInfo()
    {
        return $this->belongsTo(StudentAcademic::class,'student_id','id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
