<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedCoaGrandParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coa_grand_parents', function (Blueprint $table) {
            $cats = ['Balance Sheet Accounts','Profit & Loss Accounts'];
            foreach ($cats as $cat){
                DB::table('coa_grand_parents')->insert(['name'=>$cat]);
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
        Schema::table('coa_grand_parents', function (Blueprint $table) {
            //
        });
    }
}
