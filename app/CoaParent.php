<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoaParent extends Model
{
    protected $fillable = ['coa_grand_parent_id','name','side'];

    public function parent()
    {
        return $this->belongsTo(CoaGrandParent::class,'coa_grand_parent_id');
    }

    public function children()
    {
        return $this->hasMany(ChartOfAccount::class);
    }
}
