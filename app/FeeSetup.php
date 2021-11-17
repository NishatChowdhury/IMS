<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeSetup extends Model
{
    protected $fillable = ['academic_class_id','session_id','class_id','group_id','month_id','year'];

    public function category(){
        return $this->belongsTo(FeeCategory::class);
    }

    public function fee_categories(){
            return $this->belongsToMany(FeeCategory::class,'fee_pivots')->withPivot('amount');
    }

    public function pivot_fees(){
        return $this->hasMany(FeePivot::class);
    }

    public function session(){
        return $this->belongsTo(Session::class);
    }

    public function academicClass()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function fee_setup_pivot(){
        return $this->hasMany(FeeSetupPivot::class);
    }

}
