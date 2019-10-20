<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('session_id');
            $table->unsignedBigInteger('academic_class_id');
            $table->string('name');
            $table->string('code');
            $table->unsignedBigInteger('group_id');
            $table->string('section_name');
            $table->decimal('tuition_fee', 8,2);
            $table->decimal('admission_fee', 8, 2);
            $table->decimal('admission_Form_fee', 8, 2);

            $table->foreign('session_id')
                ->references('id')
                ->on('sessions')
                ->onDelete('cascade');

            $table->foreign('academic_class_id')
                ->references('id')
                ->on('academic_classes')
                ->onDelete('cascade');

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign('[session_id]');
            $table->dropForeign(['academic_class_id']);
            $table->dropForeign('[group_id]');

            Schema::dropIfExists('session_classes');
        });
    }
}



