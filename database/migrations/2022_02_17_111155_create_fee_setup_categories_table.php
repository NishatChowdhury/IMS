<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeSetupCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_setup_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fee_setup_student_id');
            $table->unsignedBigInteger('category_id');
            $table->float('amount',8,2);
            $table->float('paid',8,2)->nullable();
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
        Schema::dropIfExists('fee_setup_categories');
    }
}
