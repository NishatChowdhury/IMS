<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeeSetupPivot extends Model
{
    protected $table ='fee_pivot_fee_setup';
    protected $fillable = ['fee_setup_id','fee_category_id','amount'];

}
