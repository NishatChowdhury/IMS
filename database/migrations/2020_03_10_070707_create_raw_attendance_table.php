<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('raw_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id');
            $table->unsignedBigInteger('access_id');
            $table->string('department')->nullable();
            $table->string('unit_id');
            $table->string('card')->nullable();
            $table->string('unit_name');
            $table->string('user_name');
            $table->date('access_date')->nullable();
            $table->time('access_time')->nullable();
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
        Schema::dropIfExists('raw_attendances');
    }
}
