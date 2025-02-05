<?php

namespace Modules\AccountsAndFinance\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Backend\COA;
use App\Models\Backend\CoaGrandparent;
use App\Models\Backend\CoaParent;
use App\Models\Backend\JournalItem;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    function balance_sheet(){
        $coaGrandParent = CoaGrandParent::all();
        $revenue_coas = CoaParent::whereName('Revenue')->first()->children;
        $expense_coas = CoaParent::whereName('Expense')->first()->children;
        // return $coaGrandParent->first()->children->first()->children;
        return view('accountsandfinance::reports.balance_sheet', compact('coaGrandParent','revenue_coas','expense_coas'));
    }

    public function ledger(Request $request)
    {
        $this->validate($request,[
            'start_date' => 'date',
            'end_date' => 'date'
        ]);

        $coa = COA::all()->pluck('name','id');
        $acc = collect();
        //$account = 'Account Name';

        if($request->has('start_date') && $request->has('end_date') && $request->has('account')){
            $start = $request->get('start_date');
            $end = $request->get('end_date');

//            $heads = COA::query()
//                ->whereHas('items',function($query)use($start,$end){
//                    $query->whereHas('journal',function($q)use($start,$end){
//                        $q->whereBetween('date',[$start,$end]);
//                    });
//                });
//
//            if($request->has('account') && $request->get('account') !== null){
//                $heads->where('id',$request->get('account'));
//            }
//
//            $acc = $heads->get();

            $heads = JournalItem::query()
                ->whereHas('journal',function($query)use($request){
                    $query->whereBetween('date',[$request->get('start_date'),$request->get('end_date')]);
                });
                //->where('coa_id',$request->get('account'));

            if($request->has('account') && $request->get('account') !== null){
                $heads->where('coa_id',$request->get('account'));
            };

            $acc = $heads->get()->groupBy('coa_id');
//
//            $account = COA::query()->findOrFail($request->get('account'))->name;
        }

        return view('accountsandfinance::accounting.ledger',compact('coa','acc'));
    }

    public function trialBalance(Request $request)
    {
        // dd();
        $start = $request->get('start_date');
        $end = $request->get('end_date');
        $accounts = JournalItem::query()
            ->whereHas('journal',function($query)use($request){
                $query->whereBetween('date',[$request->get('start_date'),$request->get('end_date')]);
            })->whereHas('coa',function($query){
                $query->where('is_enabled',1);
            })
            ->get()
            ->groupBy('coa_id');

        $accounts = COA::query()
            ->whereHas('items',function($query)use($start,$end){
                $query->whereHas('journal',function($query)use($start,$end){
                    $query->whereBetween('date',[$start,$end]);
                });
            })
            ->get();


        return view('accountsandfinance::accounting.trial-balance',compact('accounts','start','end'));
    }

    public function profitNLoss(Request $request)
    {
        $start = $request->get('start_date');
        $end = $request->get('end_date');

        $expenses = CoaGrandparent::query()->findOrFail(3);
        $incomes = CoaGrandparent::query()->findOrFail(4);

        return view('accountsandfinance::accounting.profit-n-loss',compact('incomes','expenses','start','end'));
    }

    public function balanceSheet(Request $request)
    {
        $start = $request->get('start_date');
        $end = $request->get('end_date');

        $assets = CoaGrandparent::query()->findOrFail(1);
        $liabilities = CoaGrandparent::query()->findOrFail(2);
        $equities = CoaGrandparent::query()->findOrFail(5);

        return view('accountsandfinance::accounting.balance-sheet',compact('start','end','assets','liabilities','equities'));
    }

}
