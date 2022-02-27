<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_bn');
            $table->string('studentId');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->string('mobile');
            $table->string('dob')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->unsignedBigInteger('blood_group_id')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('disability')->nullable();
            $table->string('freedom_fighter')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('zip')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('email')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('students');
    }
}
