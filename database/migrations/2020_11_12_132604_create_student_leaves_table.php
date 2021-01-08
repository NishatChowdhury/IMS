<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentLeavesTable extends Migration
{

    public function up()
    {
        Schema::create('student_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('leave_purpose');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('student_leaves');
    }
}
