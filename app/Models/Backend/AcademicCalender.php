<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class AcademicCalender extends Model
{
//    protected $fillable = ['session_id','name','description','start','end','sms_in','sms_out ','status'];

protected $guarded = [];
    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }
}
