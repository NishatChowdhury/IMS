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
            $table->integer('session_id')->unsigned();
            $table->integer('class_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->integer('group_id')->unsigned()->nullable();
            $table->integer('rank')->unsigned()->nullable();
            $table->string('father');
            $table->string('mother');
            $table->string('gender');
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
            $table->integer('blood_group_id')->unsigned()->nullable();
            $table->integer('religion_id')->unsigned();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('zip')->nullable();
            $table->integer('division_id')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned();
            $table->string('email')->nullable();
            $table->string('father_mobile')->nullable();
            $table->string('mother_mobile')->nullable();
            $table->integer('notification_type_id')->unsigned()->nullable();
            $table->string('status');
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
