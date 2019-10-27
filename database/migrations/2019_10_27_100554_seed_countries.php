<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $countries = ['Bangladesh', 'India', 'Pakistan', 'Myanmar', 'Bhutan', 'China', 'Russia', 'Indonesia', 'Iran', 'Japan'];
            foreach ($countries as $con){
                \App\Country::query()->create(['name'=>$con]);
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
        Schema::dropIfExists('countries');
    }
}
