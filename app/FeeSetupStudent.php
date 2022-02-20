<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeSetupStudent extends Model
{
    use HasFactory;

    protected $fillable = ['fee_setup_id','student_id'];

    /**
     * A fee setup is belongs to a student
     *
     * @return BelongsTo
     */
    public function student():BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * A fee setup has many categories
     *
     * @return HasMany
     */
    public function categories(): HasMany
    {
        return $this->hasMany(FeeSetupCategory::class);
    }
}
