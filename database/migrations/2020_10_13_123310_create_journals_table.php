<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->bigInteger('journal_no')->comment('A journal no to find debit and credit of save transaction');
            $table->boolean('debit_credit')->comment('A journal can be debit or credit');
            $table->unsignedBigInteger('chart_of_account_id');
            $table->foreign('chart_of_account_id');
            $table->bigInteger('amount');
            $table->softDeletes();
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
        Schema::table('journals', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
        Schema::dropIfExists('journals');
    }
}
