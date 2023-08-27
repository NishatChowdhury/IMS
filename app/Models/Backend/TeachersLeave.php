<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class TeachersLeave extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    protected $fillable = ['leaveId','date','leave_purpose_id','teacher_id'];

    /**
     * A leave is belongs to a leave purpose
     * @return BelongsTo
     */
    public function purpose(): BelongsTo
    {
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id');
    }

    /**
     * A leave is belongs to a Teacher
     * @return BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'teacher_id', 'id');
    }
}
