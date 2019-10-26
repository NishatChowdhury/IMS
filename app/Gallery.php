<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['name','album_id','title','description','type_id','start','end','tags','image'];
}
