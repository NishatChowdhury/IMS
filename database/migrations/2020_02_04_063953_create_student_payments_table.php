<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('group_id')->nullable();
            $table->unsignedBigInteger('session_id');
            $table->integer('month');
            $table->double('setup_amount',2);
            $table->double('transport',2)->nullable();
            $table->double('arrears',2)->nullable();
            $table->double('discount',2)->nullable();
            $table->double('fine',2)->nullable();
            $table->double('due',2)->nullable();
            $table->double('paid_amount',2);
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
        Schema::dropIfExists('student_payments');
    }
}
