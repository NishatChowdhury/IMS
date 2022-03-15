<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['name','content','image','file','order'];
}
