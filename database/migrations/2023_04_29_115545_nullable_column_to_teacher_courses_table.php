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
        Schema::table('teacher_courses', function (Blueprint $table) {
            $table->string('co_title')->nullable()->change();
            $table->string('co_topic_cover')->nullable()->change();
            $table->string('co_institute')->nullable()->change();
            $table->string('co_location')->nullable()->change();
            $table->string('co_year')->nullable()->change();
            $table->string('co_duration')->nullable()->change();
            $table->string('co_result')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_courses', function (Blueprint $table) {
            $table->string('co_title')->nullable(false)->change();
            $table->string('co_topic_cover')->nullable(false)->change();
            $table->string('co_institute')->nullable(false)->change();
            $table->string('co_location')->nullable(false)->change();
            $table->string('co_year')->nullable(false)->change();
            $table->string('co_duration')->nullable(false)->change();
            $table->string('co_result')->nullable(false)->change();
        });
    }
};
