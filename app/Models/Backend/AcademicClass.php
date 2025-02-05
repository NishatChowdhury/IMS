<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AcademicClass extends Model
{
    protected $table = 'academic_classes';

    protected $fillable = ['session_id','class_id','section_id','group_id'];

    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }

    public function academicClasses()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    /**
     * An academic class is belongs to a section
     *
     * @return BelongsTo
     */
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }


    public function studentAcademic()
    {
        return $this->hasMany(StudentAcademic::class,'academic_class_id');
    }

    public function subjects()
    {
        return $this->hasMany(AssignSubject::class,'academic_class_id');
    }



    /**
     * An academic class is belongs to a class
     *
     * @return BelongsTo
     */
    public function classes(): BelongsTo
    {
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function fee_setup(){
        return $this->hasMany(FeeSetup::class,'class_id');
    }

    //
     /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->whereHas('sessions', function ($q){
            return $q->where('active', 1);
        });
    }
}
