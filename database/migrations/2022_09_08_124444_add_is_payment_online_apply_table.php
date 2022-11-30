<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsPaymentOnlineApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('online_applies', function (Blueprint $table) {
            $table->integer('is_payment')->default(0)->after('name');
            $table->integer('online_admission_id')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('online_applies', function (Blueprint $table) {
            $table->dropColumn('is_payment');
            $table->dropColumn('online_admission_id');
        });
    }
}
