<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IssueBook extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','book_code'];
}
