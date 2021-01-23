<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewBook extends Model
{
    use HasFactory;

    protected $fillable = ['book_title','author_name','description','category_id','no_of_issue'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(BookCategory::class,'category_id');
    }

}
