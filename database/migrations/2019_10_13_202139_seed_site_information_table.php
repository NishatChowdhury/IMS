<?php

use App\Models\Backend\SiteInformation;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedSiteInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_information', function (Blueprint $table) {
            $data['title'] = 'WP';
            $data['name'] = 'Web Point Limited';
            $data['name_size'] = 25;
            $data['name_font'] = '"Maven Pro", sans-serif';
            $data['name_color'] = '#FFFFFF';
            $data['bn'] = 'ওয়েব পয়েন্ট লিমিটেড';
            $data['bn_size'] = 12;
            $data['bn_font'] = '"Maven Pro", sans-serif';
            $data['bn_color'] = '#FFFFFF';
            $data['address'] = 'College Road, Chawk Bazar, Chittagong';
            $data['institute_code'] = '1234';
            $data['eiin'] = '4321';
            $data['phone'] = '+8801875004610';
            $data['email'] = 'info@webpointbd.com';
            $data['logo'] = 'logo.jpg';
            $data['theme_id'] = 1;
            $data['admission_sms'] = 1;
            $data['admission_confirm_sms'] = 1;

            SiteInformation::query()->create($data);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site_information', function (Blueprint $table) {
            //
        });
    }
}
