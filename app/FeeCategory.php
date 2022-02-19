<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeCategory extends Model
{
    protected $table ='fee_categories';
//    protected $fillable = ['name','description','status'];
    protected $guarded =[];

    public function session(){
        return $this->belongsTo(Session::class);
    }

    public function fee_setup(){
        return $this->belongsToMany(FeeSetup::class,'fee_pivots')->withPivot('amount');
    }

    public function student_payment(){
        return $this->belongsToMany(StudentPayment::class,'payment_pivots')->withPivot('amount');
    }

}
