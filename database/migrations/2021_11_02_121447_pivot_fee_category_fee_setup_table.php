<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotFeeCategoryFeeSetupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_category_fee_setup', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fee_setup_id');
            $table->unsignedBigInteger('fee_category_id');
            $table->float('amount');
            $table->foreign('fee_setup_id')->references('id')->on('fee_setups')->onDelete('cascade');
            $table->foreign('fee_category_id')->references('id')->on('fee_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_pivot_fee_setup',function (Blueprint $table){
            $table->dropForeign(['fee_setup_id']);
            $table->dropForeign(['fee_category_id']);
        });
        Schema::dropIfExists('fee_pivot_fee_setup');
    }
}
