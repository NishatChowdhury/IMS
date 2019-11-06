<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('father_husband');
            $table->string('mobile')->unique();
            $table->date('dob');
            $table->string('nid')->unique();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('blood_group_id');
            $table->string('image');
            $table->string('mail')->unique();
            $table->string('code')->unique();
            $table->string('title');
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('job_type_id');
            $table->unsignedBigInteger('staff_type_id');
            $table->string('joining');
            $table->string('salary');
            $table->string('bonus');
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
        Schema::dropIfExists('staffs');
    }
}
