<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->string('m_name');
            $table->string('m_name_bn')->nullable();
            $table->foreignId('student_id');
            $table->string('m_mobile')->nullable();
            $table->string('m_email')->nullable();
            $table->string('m_dob')->nullable();
            $table->string('m_occupation')->nullable();
            $table->string('m_nid')->nullable();
            $table->string('m_birth_certificate')->nullable();
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
        Schema::dropIfExists('mothers');
    }
}
