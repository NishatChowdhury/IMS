<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_sscs', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->unsigned();
            $table->string('board');
            $table->string('ssc_session');
            $table->string('type');
            $table->string('year');
            $table->string('registration');
            $table->string('roll');
            $table->string('gpa');
            $table->string('group');
            $table->string('school');
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
        Schema::dropIfExists('student_sscs');
    }
}
