<?php

namespace App\Http\Controllers;

use App\CoaParent;
use App\CoaGrandParent;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    function balance_sheet(){
        $coaGrandParent = CoaGrandParent::all();
        $revenue_coas = CoaParent::whereName('Revenue')->first()->children;
        $expense_coas = CoaParent::whereName('Expense')->first()->children;
        // return $coaGrandParent->first()->children->first()->children; 
        return view('admin.reports.balance_sheet', compact('coaGrandParent','revenue_coas','expense_coas'));
    }
}
