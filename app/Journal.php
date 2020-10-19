<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable = ['description','chart_of_account_id','amount','debit_credit','journal_no'];

    function coa(){
        return $this->belongsTo(ChartOfAccount::class, 'chart_of_account_id');
    }
}
