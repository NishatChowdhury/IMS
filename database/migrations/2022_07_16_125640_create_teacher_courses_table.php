<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('staff_id');
            $table->string('co_title')->nullable();
            $table->string('co_topic_cover')->nullable();
            $table->string('co_institute')->nullable();
            $table->string('co_location')->nullable();
            $table->string('co_year')->nullable();
            $table->string('co_duration')->nullable();
            $table->string('co_country')->nullable();
            $table->string('co_result')->nullable();
            $table->string('co_c_no')->nullable();
            $table->string('co_start')->nullable();
            $table->string('co_end')->nullable();
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
        Schema::dropIfExists('teacher_courses');
    }
}
