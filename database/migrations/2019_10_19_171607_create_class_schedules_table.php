<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('day_id');
            $table->time('start');
            $table->time('end');
            $table->timestamps();

            $table->foreign('subject_id')
                ->references('id')
                ->on('assign_subjects')
                ->onDelete('cascade');

            $table->foreign('day_id')
                ->references('id')
                ->on('days')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropForeign('assign_subjects_subject_id_foreign');
        $table->dropForeign('days_day_id_foreign');

        Schema::dropIfExists('class_schedules');
    }
}
