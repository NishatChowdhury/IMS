<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];

    public function groups(){
        return $this->hasMany('App\Models\Backend\SessionClass');
    }
}
