<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoaGrandParent extends Model
{
    public function children()
    {
        return $this->hasMany(CoaParent::class);
    }
}
