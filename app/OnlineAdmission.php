<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineAdmission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
