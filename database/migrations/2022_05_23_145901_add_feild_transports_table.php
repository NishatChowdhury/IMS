<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFeildTransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transports', function (Blueprint $table) {
            $table->unsignedBigInteger('student_academic_id')->afiter('id');
            $table->string('location_name');
            $table->string('starting_date')->nullable();
            $table->string('ending_date')->nullable();
            $table->string('month');
            $table->integer('year');
            $table->integer('amount');
            $table->string('direction');
            $table->string('payment_date')->nullable();
            $table->integer('ia_paid')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('transports');

    }
}
