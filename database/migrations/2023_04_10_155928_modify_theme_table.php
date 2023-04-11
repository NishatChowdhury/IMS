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
        Schema::table('themes', function (Blueprint $table) {
            $table->dropColumn(['top_bar_background','top_bar_color','header_background','header_color','menu_background','menu_color','submenu_background','submenu_color','inner_background','inner_color','footer_background','footer_color']);
            $table->string('palette')->after('name');
            $table->string('js')->after('name');
            $table->string('css')->after('name');
            $table->string('layout')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->string('top_bar_background');
            $table->string('top_bar_color');
            $table->string('header_background');
            $table->string('header_color');
            $table->string('menu_background');
            $table->string('menu_color');
            $table->string('submenu_background');
            $table->string('submenu_color');
            $table->string('inner_background');
            $table->string('inner_color');
            $table->string('footer_background');
            $table->string('footer_color');
            $table->dropColumn(['js','css','layout','palette']);
        });
    }
};
