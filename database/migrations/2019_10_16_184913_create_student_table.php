<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('studentId');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('group_id');
            $table->integer('rank')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('father');
            $table->string('mother');
            $table->unsignedBigInteger('gender_id');
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
            $table->unsignedBigInteger('blood_group_id');
            $table->unsignedBigInteger('religion_id');
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('zip')->nullable();
            //$table->integer('division_id')->unsigned()->nullable();
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('country_id');
            $table->string('email')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->unsignedBigInteger('notification_type_id');
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
