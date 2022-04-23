<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveSessionIdMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->dropColumn('session_id');
            $table->dropColumn('class_id');
            $table->dropColumn('section_id');
            $table->dropColumn('group_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('marks', function (Blueprint $table) {
            $table->unsignedBigInteger('session_id')->after('academic_class_id');
            $table->unsignedBigInteger('class_id')->after('session_id');
            $table->unsignedBigInteger('section_id')->after('class_id');
            $table->unsignedBigInteger('group_id')->after('section_id');
        });
    }
}
