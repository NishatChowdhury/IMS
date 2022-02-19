<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeSetupCategory extends Model
{
    use HasFactory;

    protected $table ='fee_setup_categories';

    protected $fillable = ['fee_setup_student_id','category_id','amount','paid'];
}
