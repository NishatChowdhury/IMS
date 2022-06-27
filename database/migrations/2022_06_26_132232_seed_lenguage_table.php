<?php

use App\Models\Backend\Language;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedLenguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('languages', function (Blueprint $table) {
            $data = [
                'en' => [
                    'name' => 'English',
                    'alias' => 'en',
                    'direction' => 'ltr',
                    'default' => 1,
                    'is_active' => 1
                ],
                'bn' => [
                    'name' => 'বাংলা',
                    'alias' => 'bn',
                    'direction' => 'ltr',
                    'default' => 0,
                    'is_active' => 1
                ],
                'ar' => [
                    'name' => 'عربى',
                    'alias' => 'ar',
                    'direction' => 'ltr',
                    'default' => 0,
                    'is_active' => 1
                ]
            ];

            foreach ($data as $d){
                Language::query()->create($d);
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
        Schema::table('languages', function (Blueprint $table) {
            //
        });
    }
}
