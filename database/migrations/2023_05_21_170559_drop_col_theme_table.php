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
           // $table->dropColumn(['layout','layout_inner','top_bar_background','top_bar_color','header_background','header_color','menu_background','menu_color','submenu_background','submenu_color','inner_background','inner_color','footer_background','footer_color']);
            $table->dropColumn(['layout','top_bar_background','top_bar_color','header_background','header_color','menu_background','menu_color','submenu_background','submenu_color','inner_background','inner_color','footer_background','footer_color']);
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
            $table->string('layout_home')->nullable();
            $table->string('layout_inner')->nullable();
            $table->string('top_bar_background')->nullable();
            $table->string('top_bar_color')->nullable();
            $table->string('header_background')->nullable();
            $table->string('header_color')->nullable();
            $table->string('menu_background')->nullable();
            $table->string('menu_color')->nullable();
            $table->string('submenu_background')->nullable();
            $table->string('submenu_color')->nullable();
            $table->string('inner_background')->nullable();
            $table->string('inner_color')->nullable();
            $table->string('footer_background')->nullable();
            $table->string('footer_color')->nullable();
        });
    }
};
