<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
//    protected $fillable =['location_id','student_id','status'];

    protected $guarded = [];
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    function studentAcademic(){
        return $this->belongsTo(StudentAcademic::class);
    }
}
