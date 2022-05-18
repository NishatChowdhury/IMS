<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudentAcademicRemoveAcademicIdExamResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('exam_results', function (Blueprint $table) {
            $table->dropColumn('academic_class_id');
            $table->dropColumn('student_id');
            $table->unsignedBigInteger('student_academic_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
