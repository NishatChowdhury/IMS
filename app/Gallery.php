<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['album_id','title','description','type_id','start','end','tags','image'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
