<?php

use App\Models\Backend\Theme;
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
            $data = [
                [
                    'name' => 'Green',
                    'css' => 'dist/css/green.css',
                    'js' => '',
                ],[
                    'name' => 'Blue Gray',
                    'css' => 'dist/css/blue-gray.css',
                    'js' => '',
                ],[
                    'name' => 'Lavender',
                    'css' => 'dist/css/lavender.css',
                    'js' => '',
                ],[
                    'name' => 'Navy',
                    'css' => 'dist/css/navy.css',
                    'js' => '',
                ],[
                    'name' => 'Red',
                    'css' => 'dist/css/red.css',
                    'js' => '',
                ],[
                    'name' => 'Sky',
                    'css' => 'dist/css/sky.css',
                    'js' => '',
                ],[
                    'name' => 'Yellow',
                    'css' => 'dist/css/yellow.css',
                    'js' => '',
                ]
            ];

            Theme::query()->truncate();

            foreach ($data as $d) {
                Theme::query()->create($d);
            }

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
            Theme::query()->truncate();
        });
    }
};
