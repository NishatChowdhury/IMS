<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineAdmission extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['start','end'];

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }
    public function sessions()
    {
        return $this->belongsTo(Session::class,'session_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function sections()
    {
        return $this->belongsTo(Section::class);
    }
}
