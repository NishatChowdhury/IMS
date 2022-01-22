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
            $table->string('g_name_bn');
            $table->foreignId('student1_id');
            $table->string('g_mobile');
            $table->string('g_email')->nullable();
            $table->string('g_dob');
            $table->string('g_occupation');
            $table->string('g_nid');
            $table->string('g_birth_certificate');
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
