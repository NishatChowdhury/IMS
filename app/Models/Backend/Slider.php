<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['title','description','start','end','image','active'];
}
