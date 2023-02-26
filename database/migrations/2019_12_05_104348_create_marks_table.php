<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->id();
            $table->integer('academic_class_id')->nullable();
            $table->integer('exam_id');
            $table->integer('subject_id');
            $table->integer('student_id');
            $table->integer('full_mark');
            $table->float('objective')->nullable();
            $table->float('written')->nullable();
            $table->float('practical')->nullable();
            $table->float('viva')->nullable();
            $table->float('total_mark')->nullable();
            $table->string('gpa')->nullable();
            $table->string('grade')->nullable();
            $table->unsignedBigInteger('grade_id');
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
        Schema::dropIfExists('marks');
    }
}
