<?php


namespace App\Repository;


use App\Models\Backend\ChartOfAccount;
use App\Models\Backend\CoaParent;

class FinanceRepository
{
    public function parents()
    {
        return CoaParent::all()->pluck('name','id');
    }

    public function coa()
    {
        return ChartOfAccount::all()->pluck('name','id');
    }
}
