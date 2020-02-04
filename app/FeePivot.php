<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeePivot extends Model
{
    protected $table ='fee_pivots';
    protected $fillable = ['fee_category_id','fee_setup_id','amount'];


}
