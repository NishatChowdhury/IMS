<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class FeeSetup extends Model
{
    protected $fillable = ['academic_class_id','student_id','month_id','year'];

    /**
     * A fee setup is belongs to an academic class
     *
     * @return BelongsTo
     */

    public function academicClass(): BelongsTo
    {
        return $this->belongsTo(AcademicClass::class);
    }

    /**
     * A fee setup has many fee setup students
     *
     * @return HasMany
     */
    public function feeSetupStudent(): HasMany
    {
        return $this->hasMany(FeeSetupStudent::class);
    }

    /**
     * A fee setup has many categories through students
     *
     * @return HasManyThrough
     */
    public function feeSetupCategories(): HasManyThrough
    {
        return $this->hasManyThrough(FeeSetupCategory::class,FeeSetupStudent::class);
    }

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

    public function students(){
          return $this->hasMany(FeeSetupStudent::class);
    }




}
