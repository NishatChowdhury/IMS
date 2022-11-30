<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlinePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('online_paymentable_id');
            $table->string('online_paymentable_type');
            $table->string('tran_id');
            $table->string('val_id');
            $table->double('amount');
            $table->string('card_type')->nullable();
            $table->string('store_amount');
            $table->string('card_no')->nullable();
            $table->string('bank_tran_id')->nullable();
            $table->string('status');
            $table->string('card_issuer')->nullable();
            $table->string('card_brand')->nullable();
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
        Schema::dropIfExists('online_payments');
    }
}
