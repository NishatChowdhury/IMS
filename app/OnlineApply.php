<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineApply extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classes()
    {
        return $this->belongsTo(Classes::class,'class_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
