<?php

namespace App\Http\Controllers;

use App\Classes;
use App\FeeCategory;
use App\FeeSetup;
use App\FeeSetupPivot;
use App\Group;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FeeSetupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $classes = Classes::query()->pluck('name','id');
        $session = Session::query()->pluck('year','id');
        $groups = Group::query()->pluck('name','id');
        $fee_category = FeeCategory::query()->pluck('name','id');

        return view('admin.feeSetup.feeSetup',compact('session','classes','groups','fee_category'));
    }

    public function feeSetupStore(Request $request){
//        dd($request->all());
        $query = DB::select(DB::Raw("SHOW TABLE STATUS LIKE 'fee_setups'"));
        $query= $query[0]->Auto_increment;
        $count = null;

        FeeSetup::create($request->all());
        $fee_setup_id = FeeSetup::where('id', $request->input('fee_setup_id'))->withCount('pivot_fees')->first();
//            $fee_setup_id= $request->fee_setup_id->count();
        $fee_category_id= $request->fee_category_id;
        $amount = $request->amount;

        for($count = 0;  $count++;)
        {
            $data = array(
                'fee_setup_id'  => $fee_setup_id[$count],
                'fee_category_id'  => $fee_category_id[$count],
                'amount' => $amount[$count],
            );

            $insert_data[] = $data;
        }

        FeeSetupPivot::create($insert_data[]);

        return Redirect::to('fee-setup.index')
            ->with('success','Great! Added successfully.');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
