<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class FeeSetup extends Model
{
    protected $fillable = ['academic_class_id','student_id','month_id','year'];

//    public function category(){
//        return $this->belongsTo(FeeCategory::class,'fee_category_id');
//    }

//    public function fee_categories(){
//        return $this->belongsToMany(FeeCategory::class,'fee_pivots')->withPivot('amount');
//    }

//    public function pivot_fees(){
//        return $this->hasMany(FeePivot::class);
//    }

//    public function session(){
//        return $this->belongsTo(Session::class);
//    }

    /**
     * A fee setup is belongs to an academic class
     *
     * @return BelongsTo
     */
    
    public function academicClass(): BelongsTo
    {
        return $this->belongsTo(AcademicClass::class);
    }

    // public function studentID()
    // {
    //     return $this->belongsTo(Student::class,'student_id');
    // }

    /**
     * A fee setup has many fee setup students
     * @return HasMany
     */
     
  

    /**
     * A fee setup has many categories through students
     *
     * @return HasManyThrough
     */
    public function feeSetupCategories(): HasManyThrough
    {
        return $this->hasManyThrough(FeeSetupCategory::class,FeeSetupStudent::class);
    }

//    /**
//     * A fee setup is belongs to a student
//     *
//     * @return BelongsTo
//     */
//    public function student(): BelongsTo
//    {
//        return $this->belongsTo(Student::class,'student_id');
//    }

    /**
     * A fee setup is belongs to a month
     *
     * @return BelongsTo
     */
    public function month(): BelongsTo
    {
        return $this->belongsTo(Month::class);
    }

//    /**
//     * A fee setup is belongs to a Section
//     *
//     * @return BelongsTo
//     */
//    public function section(): BelongsTo
//    {
//        return $this->belongsTo(Section::class);
//    }

}
