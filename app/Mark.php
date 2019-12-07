<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['session_id','exam_id','class_id','subject_id','student_id','full_mark','objective','written','practical','viva','total_mark','gpa','grade'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
