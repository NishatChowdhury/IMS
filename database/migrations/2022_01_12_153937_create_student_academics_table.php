<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_academics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id');
            $table->foreignId('academic_class_id');
            $table->foreignId('session_id');
            $table->foreignId('class_id');
            $table->foreignId('section_id')->nullable();
            $table->foreignId('group_id')->nullable();
            $table->foreignId('shift_id');
            $table->string('rank');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('student_academics');
    }
}
