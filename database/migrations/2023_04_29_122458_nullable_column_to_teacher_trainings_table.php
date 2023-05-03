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
        Schema::table('teacher_trainings', function (Blueprint $table) {
            $table->string('tr_title')->nullable()->change();
            $table->string('tr_topic_cover')->nullable()->change();
            $table->string('tr_institute')->nullable()->change();
            $table->string('tr_location')->nullable()->change();
            $table->string('tr_year')->nullable()->change();
            $table->string('tr_duration')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_trainings', function (Blueprint $table) {
            $table->string('tr_title')->nullable(false)->change();
            $table->string('tr_topic_cover')->nullable(false)->change();
            $table->string('tr_institute')->nullable(false)->change();
            $table->string('tr_location')->nullable(false)->change();
            $table->string('tr_year')->nullable(false)->change();
            $table->string('tr_duration')->nullable(false)->change();
        });
    }
};
