<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['name', 'session_id', 'class_id', 'group_id'];
}
