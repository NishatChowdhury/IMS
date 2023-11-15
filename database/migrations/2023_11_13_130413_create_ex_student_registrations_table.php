<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_student_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('father');
            $table->string('mother');
            $table->string('email')->nullable();
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('passing_year');
            $table->string('mobile');
            $table->unsignedBigInteger('blood_group')->nullable();
            $table->string('profession')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('ex_student_registrations');
    }
};
