<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeavePurpose extends Model
{
    use HasFactory;

    protected $fillable = ['leave_purpose'];
}
