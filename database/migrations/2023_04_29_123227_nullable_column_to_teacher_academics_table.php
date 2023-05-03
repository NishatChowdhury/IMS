<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_academics', function (Blueprint $table) {
            $table->string('ac_label_education')->nullable()->change();
            $table->string('ac_institute')->nullable()->change();
            $table->string('ac_degree')->nullable()->change();
            $table->string('ac_result')->nullable()->change();
            $table->string('ac_major')->nullable()->change();
            $table->string('ac_duration')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_academics', function (Blueprint $table) {
            $table->string('ac_label_education')->nullable(false)->change();
            $table->string('ac_institute')->nullable(false)->change();
            $table->string('ac_degree')->nullable(false)->change();
            $table->string('ac_result')->nullable(false)->change();
            $table->string('ac_major')->nullable()->change();
            $table->string('ac_duration')->nullable(false)->change();
        });
    }
};
