<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeeSetupCategory extends Model
{
    use HasFactory;

    protected $table ='fee_setup_categories';

    protected $fillable = ['fee_setup_student_id','category_id','amount','paid'];

    /**
     * A fee setup category is belongs to a fee category
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(FeeCategory::class);
    }

    public function fee_setup_students()
    {
        return $this->belongsTo(FeeSetupStudent::class,'fee_setup_student_id');
    }
}
