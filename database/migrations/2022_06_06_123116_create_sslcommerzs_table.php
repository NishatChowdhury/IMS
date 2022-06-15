<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSslcommerzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sslcommerzs', function (Blueprint $table) {
            $table->id();
            $table->string('tran_id');
            $table->string('val_id');
            $table->string('amount');
            $table->string('cart_type');
            $table->string('store_amount');
            $table->lineString('card_no');
            $table->string('bank_tran_id');
            $table->string('status');
            $table->timestamp( 'tran_date');
            $table->string('error')->nullable();
            $table->string('currency');
            $table->string('card_issuer');
            $table->string('card_brand');
            $table->string('card_sub_brand');
            $table->string('card_issuer_country');
            $table->string('card_issuer_country_code');
            $table->string('store_id');
            $table->string('verify_sign');
            $table->string('verify_key');
            $table->string('verify_sign_sha2');
            $table->string('currency_type');
            $table->string('currency_amount');
            $table->string('currency_rate');
            $table->string('base_fair');
            $table->string('value_a');
            $table->string('value_b');
            $table->string('value_c');
            $table->string('value_d');
            $table->string('subscription_id')->nullable();
            $table->string('risk_level');
            $table->string('risk_title');
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
        Schema::dropIfExists('sslcommerzs');
    }
}
