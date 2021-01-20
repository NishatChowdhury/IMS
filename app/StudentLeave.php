<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentLeave extends Model
{
    use HasFactory;

    protected $dates = ['start_date','end_date'];

    protected $fillable = ['student_id','start_date','end_date','leave_purpose_id'];

    /**
     * A leave is belongs to a leave purpose
     * @return BelongsTo
     */
    public function purpose(): BelongsTo
    {
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id');
    }

    /**
     * A leave is belongs to a student
     * @return BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
