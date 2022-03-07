<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['date','reference','description','journal_no','user_id'];

    function coa(){
        return $this->belongsTo(ChartOfAccount::class, 'chart_of_account_id');
    }

    /**
     * A journal has many items
     * @return HasMany
     */
    function items(): HasMany
    {
        return $this->hasMany(JournalItem::class,'journal_id');
    }
}
