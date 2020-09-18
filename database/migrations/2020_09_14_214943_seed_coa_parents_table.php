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
                [
                    'coa_grand_parent_id' => 1,
                    'name'=>'Asset Accounts',
                    'side'=>'Dr',
                ],
                [
                    'coa_grand_parent_id' => 1,
                    'name'=>'Liability Accounts',
                    'side'=>'Cr',
                ],
                [
                    'coa_grand_parent_id' => 1,
                    'name'=>'Equity Accounts',
                    'side'=>'Cr',
                ],
                [
                    'coa_grand_parent_id' => 2,
                    'name'=>'Revenue Accounts',
                    'side'=>'Dr',
                ],
                [
                    'coa_grand_parent_id' => 2,
                    'name'=>'Expense Accounts',
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
