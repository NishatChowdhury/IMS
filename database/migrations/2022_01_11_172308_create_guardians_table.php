<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('g_name');
            $table->string('g_name_bn')->nullable();
            $table->foreignId('student_id');
            $table->string('g_mobile')->nullable();
            $table->string('g_email')->nullable();
            $table->string('g_dob')->nullable();
            $table->string('g_occupation')->nullable();
            $table->string('g_nid')->nullable();
            $table->string('g_birth_certificate')->nullable();
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
        Schema::dropIfExists('guardians');
    }
}
