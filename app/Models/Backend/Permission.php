<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function module()
    {
       return $this->belongsTo(Module::class);
    }
    public function roles()
    {
       return $this->belongsToMany(Role::class,'permission_role');
    }
}
