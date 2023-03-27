<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetencyRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competency_remarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_class_id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('competency_id');
            $table->unsignedBigInteger('indicator_id');
            $table->unsignedBigInteger('remark_id');
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
        Schema::dropIfExists('competency_remarks');
    }
}
