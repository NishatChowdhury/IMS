<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_trainings', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->string('tr_title')->nullable();
            $table->string('tr_topic_cover')->nullable();
            $table->string('tr_institute')->nullable();
            $table->string('tr_location')->nullable();
            $table->string('tr_year')->nullable();
            $table->string('tr_duration')->nullable();
            $table->string('tr_country')->nullable();
            $table->string('tr_start')->nullable();
            $table->string('tr_end')->nullable();
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
        Schema::dropIfExists('teacher_trainings');
    }
}
