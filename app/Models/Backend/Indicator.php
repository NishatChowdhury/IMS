<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicator extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','competency_id'];

    // An Indicator belongs to a Competency
    public function competency(){
        return $this->belongsTo(Competency::class);
    }
}
