<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_academics', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->string('ac_label_education');
            $table->string('ac_institute');
            $table->string('ac_board')->nullable();
            $table->string('ac_degree');
            $table->string('ac_result');
            $table->string('ac_major');
            $table->string('ac_year')->nullable();
            $table->string('ac_duration');
            $table->string('ac_achievement')->nullable();
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
        Schema::dropIfExists('teacher_academics');
    }
}
