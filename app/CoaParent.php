<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoaParent extends Model
{
    public function children()
    {
        return $this->hasMany(ChartOfAccount::class);
    }
}
