<?php

use App\CoaParent;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedCoaParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coa_parents', function (Blueprint $table) {
            $cats = [
                // Asset Side
                [
                    'coa_grand_parent_id' => 1, //Asset Accounts
                    'name'=>'Current Assets',
                    'side'=>'Dr',
                ],
                [
                    'coa_grand_parent_id' => 1, //Asset Accounts
                    'name'=>'Long Term Investments',
                    'side'=>'Dr',
                ],
                [
                    'coa_grand_parent_id' => 1, //Asset Accounts
                    'name'=>'Fixed Assets',
                    'side'=>'Dr',
                ],
                [
                    'coa_grand_parent_id' =>1, //Asset Accounts
                    'name'=>'Intengible Assets',
                    'side'=>'Dr',
                ],
                [
                    'coa_grand_parent_id' =>1, //Asset Accounts
                    'name'=>'Other Assets',
                    'side'=>'Dr',
                ],
                // Libility Side
                [
                    'coa_grand_parent_id' =>2, // Liability Accounts
                    'name'=>'Current liabilities',
                    'side'=>'Cr',
                ],
                [
                    'coa_grand_parent_id' =>2, // Liability Accounts
                    'name'=>'Long Term liabilities',
                    'side'=>'Cr',
                ],
                [
                    'coa_grand_parent_id' =>3, // Equity Accounts
                    'name'=>'Stock Holders\' Equity',
                    'side'=>'Cr',
                ],
                [
                    'coa_grand_parent_id' =>4, // Revenue Accounts
                    'name'=>'Revenue',
                    'side'=>'Cr',
                ],
                [
                    'coa_grand_parent_id' =>5, // Expense Accounts
                    'name'=>'Expense',
                    'side'=>'Cr',
                ],
            ];
            foreach ($cats as $cat => $side){
                CoaParent::query()->create($side);
                //DB::table('coa_parents')->insert(['name'=>$cat,'side'=>$side]);
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coa_parents', function (Blueprint $table) {
            //
        });
    }
}
