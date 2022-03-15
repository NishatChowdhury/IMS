<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('online_applies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_bn');
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('session_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('mobile');
            $table->string('dob')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->unsignedBigInteger('blood_group_id')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->string('nationality')->nullable();
            $table->string('disability')->nullable();
            $table->string('freedom_fighter')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('zip')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('email')->nullable();
            // father
            $table->string('f_name');
            $table->string('f_name_bn');
            $table->string('f_mobile');
            $table->string('f_email')->nullable();
            $table->string('f_dob');
            $table->string('f_occupation');
            $table->string('f_nid');
            $table->string('f_birth_certificate')->nullable();
            //mother
            $table->string('m_name');
            $table->string('m_name_bn');
            $table->string('m_mobile');
            $table->string('m_email')->nullable();
            $table->string('m_dob');
            $table->string('m_occupation');
            $table->string('m_nid');
            $table->string('m_birth_certificate')->nullable();
            //guardian
            $table->string('g_name');
            $table->string('g_name_bn');
            $table->string('g_mobile');
            $table->string('g_email')->nullable();
            $table->string('g_dob');
            $table->string('g_occupation');
            $table->string('g_nid');
            $table->string('g_birth_certificate')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('online_applies');
    }
}
