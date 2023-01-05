<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['album_id','gallery_category_id','title','description','tags','image'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
