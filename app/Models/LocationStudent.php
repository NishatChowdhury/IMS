<?php

namespace App\Models;

use App\Models\Backend\Location;
use App\Models\Backend\StudentAcademic;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationStudent extends Model
{
    use HasFactory;
    protected $guarded = [];

    function location(){
        return $this->belongsTo(Location::class);
    }
    function studentAcademic(){
        return $this->belongsTo(StudentAcademic::class);
    }
}
