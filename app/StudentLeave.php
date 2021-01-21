<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentLeave extends Model
{
    use HasFactory;

    protected $dates = ['start_date','end_date'];

    protected $fillable = ['student_id','date','start_date','end_date','leave_purpose_id'];


    public function purpose(): BelongsTo
    {
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id');
    }


    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
