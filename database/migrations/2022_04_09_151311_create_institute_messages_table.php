<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstituteMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institute_messages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->longText('body')->nullable();
            $table->string('image')->nullable();
            $table->string('alias')->nullable()->uniqid;
            $table->timestamps();
        });
        DB::table('institute_messages')->insert([
            ['alias' => 'about'],
            ['alias' => 'chairman'],
            ['alias' => 'principal'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institute_messages');
    }
}
