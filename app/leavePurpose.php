<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leavePurpose extends Model
{
    use HasFactory;

    protected $fillable = ['leave_purpose'];
}
