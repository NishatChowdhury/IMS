<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('name');
            $table->string('father');
            $table->string('mother');
            $table->date('dob');
            $table->string('nid');
            $table->string('institute');
            $table->string('designation');
            $table->string('address');
            $table->string('mobile');
            $table->string('email');
            $table->string('social');
            $table->string('pada');
            $table->string('badi');
            $table->string('village');
            $table->string('po');
            $table->string('ps');
            $table->string('district');
            $table->integer('dakhil_from');
            $table->integer('dakhil_to');
            $table->integer('alim_from');
            $table->integer('alim_to');
            $table->integer('fazil_from');
            $table->integer('fazil_to');
            $table->integer('kamil_from');
            $table->integer('kamil_to');
            $table->string('image');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumni');
    }
}
