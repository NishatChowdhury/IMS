<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $fillable = ['name','start','end','grace','late_fee','absent_fee'];
}
