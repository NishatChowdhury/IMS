<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function permissions()
    {
       return $this->belongsToMany(Permission::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
    public function usersList(){
        return $this->belongsToMany(User::class);
    }
}
