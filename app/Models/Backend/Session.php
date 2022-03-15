<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['year', 'start', 'end', 'description','active'];
}
