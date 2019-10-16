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
            $table->integer('group_id')->unsigned();
            $table->integer('rank')->unsigned();
            $table->string('father');
            $table->string('mother');
            $table->string('mobile');
            $table->string('dob');
            $table->integer('gender_id')->unsigned();
            $table->integer('blood_group_id')->unsigned();
            $table->integer('religion_id')->unsigned();
            $table->string('address');
            $table->string('area');
            $table->string('zip');
            $table->integer('state_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->string('email');
            $table->string('father_mobile');
            $table->string('mother_mobile');
            $table->integer('notification_type_id')->unsigned();
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
