<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class FeeSetupPivot extends Model
{
    protected $table ='fee_pivots';

    protected $fillable = ['fee_setup_id','fee_category_id','amount'];

}
