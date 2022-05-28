<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateLocationStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('location_students', function (Blueprint $table) {
            $table->string('starting_date')->nullable();
            $table->string('ending_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('location_students', function (Blueprint $table) {
            $table->dropColumn('starting_date')->nullable();
            $table->dropColumn('ending_date')->nullable();
        });
    }
}
