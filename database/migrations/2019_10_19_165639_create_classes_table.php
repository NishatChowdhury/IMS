<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('session_id');
            //$table->unsignedBigInteger('academic_class_id');
            $table->string('name');
            $table->string('code');
            $table->unsignedBigInteger('group_id');
            $table->string('section_name');
            $table->decimal('tuition_fee', 8,2);
            $table->decimal('admission_fee', 8, 2);
            $table->decimal('admission_Form_fee', 8, 2);


            /*$table->foreign('academic_class_id')
                ->references('id')
                ->on('academic_classes')
                ->onDelete('cascade');*/

            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');

            $table->foreign('session_id')
                ->references('id')
                ->on('sessions')
                ->onDelete('cascade');
        });

        /*
         //For foreign Key....
         Schema::table('classes', function ($table){

        });*/
    }

    public function down()
    {
        Schema::table('classes', function (Blueprint $table) {
            $table->dropForeign('sessions_session_id_foreign');
            //$table->dropForeign('academic_classes_academic_class_id_foreign');
            $table->dropForeign('groups_group_id_foreign');

            Schema::dropIfExists('classes');
        });
    }
}
