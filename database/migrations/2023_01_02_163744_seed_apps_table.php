<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SeedAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apps', function (Blueprint $table) {
            $data = [
                [
                    'name' => 'Settings',
                    'color' => 'white',
                    'background' => '#1abc9c',
                    'icon' => 'fas fa-sliders-h',
                    'prefix' => 'settings',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Media',
                    'color' => 'white',
                    'background' => '#2ecc71',
                    'icon' => 'fas fa-photo-video',
                    'prefix' => 'media',
                    'guard' => 'web'
                ],
                [
                    'name' => 'HRM',
                    'color' => 'white',
                    'background' => '#3498db',
                    'icon' => 'fas fa-globe',
                    'prefix' => 'hrm',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Accounts & Finance',
                    'color' => 'white',
                    'background' => '#9b59b6',
                    'icon' => 'fas fa-file-invoice-dollar',
                    'prefix' => 'accounts-n-finance',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Admission',
                    'color' => 'white',
                    'background' => '#34495e',
                    'icon' => 'fas fa-user-graduate',
                    'prefix' => 'admission',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Exam & Result',
                    'color' => 'white',
                    'background' => '#f1c40f',
                    'icon' => 'fas fa-chart-line',
                    'prefix' => 'exam-n-result',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Transport',
                    'color' => 'white',
                    'background' => '#e67e22',
                    'icon' => 'fas fa-bus-alt',
                    'prefix' => 'transport',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Library',
                    'color' => 'white',
                    'background' => '#e74c3c',
                    'icon' => 'fas fa-book-reader',
                    'prefix' => 'library',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Hostel & Canteen',
                    'color' => 'white',
                    'background' => '#075f84',
                    'icon' => 'fas fa-bed',
                    'prefix' => 'hostel-n-canteen',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Virtual Classroom',
                    'color' => 'white',
                    'background' => '#95a5a6',
                    'icon' => 'fas fa-chalkboard-teacher',
                    'prefix' => 'virtual-classroom',
                    'guard' => 'web'
                ],
                [
                    'name' => 'KPI',
                    'color' => 'white',
                    'background' => '#fc5c65',
                    'icon' => 'fas fa-chart-pie',
                    'prefix' => 'kpi',
                    'guard' => 'web'
                ],
                [
                    'name' => 'Extra Curriculum',
                    'color' => 'white',
                    'background' => '#fab1a0',
                    'icon' => 'fab fa-usb',
                    'prefix' => 'extra-curriculum',
                    'guard' => 'web'
                ],
            ];

            foreach ($data as $d){
                DB::table('apps')->insert($d);
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
        Schema::table('apps', function (Blueprint $table) {
            //
        });
    }
}
