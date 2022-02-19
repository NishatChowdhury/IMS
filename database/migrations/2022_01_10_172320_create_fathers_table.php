<?php

use App\Student;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('f_name_bn')->nullable();
            $table->foreignId('student_id');
            $table->string('f_mobile')->nullable();
            $table->string('f_email')->nullable();
            $table->string('f_dob')->nullable();
            $table->string('f_occupation')->nullable();
            $table->string('f_nid')->nullable();
            $table->string('f_birth_certificate')->nullable();
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
        Schema::dropIfExists('fathers');
    }
}
