<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance_teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('staff_id');
            $table->date('date');
            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();
            $table->time('manual_in_time')->nullable();;
            $table->time('manual_out_time')->nullable();
            $table->integer('shift_id')->default(1);
            $table->integer('attendance_status_id');
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
        Schema::dropIfExists('attendance_teachers');
    }
}
