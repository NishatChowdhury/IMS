<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['name','year','start','end','notify'];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }
}
