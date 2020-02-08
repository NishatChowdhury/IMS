<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignFeesetupSessionClassFeecategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fee_setups', function (Blueprint $table) {
            $table->foreign('session_id')->references('id')->on('sessions');
            //$table->foreign('class_id')->references('id')->on('classes');
//            $table->foreign('category_id')->references('id')->on('fee_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fee_setups', function (Blueprint $table) {
            $table->dropForeign(['session_id']);
            $table->dropForeign(['class_id']);
//            $table->dropForeign(['category_id']);
        });
    }
}
