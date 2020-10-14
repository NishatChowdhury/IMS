<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    protected $fillable = ['coa_parent_id','name','is_active'];

    public function parent()
    {
        return $this->belongsTo(CoaParent::class,'coa_parent_id');
    }

    function scopeActive($coa){
        return $coa->whereIsActive(1)->get();
    }

}
