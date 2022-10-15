<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni';

    protected $fillable = ["login","name", "father", "mother", "dob", "nid", "institute", "designation", "address", "mobile", "email", "social", "pada", "badi", "village", "po", "ps", "district", "dakhil_from", "dakhil_to", "alim_from", "alim_to", "fazil_from", "fazil_to", "kamil_from", "kamil_to",'image'];
}
