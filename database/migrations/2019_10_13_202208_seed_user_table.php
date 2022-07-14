<?php

use App\Models\Backend\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $data = [
                [
                    'name' => 'Master',
                    'module' => 1,
                    'email' => 'master@gmail.com',
                    'role_id' => 1,
                    'password' => bcrypt('admin123'),
                ],
                [
                    'name' => 'Administrator',
                    'module' => 0,
                    'email' => 'admin@gmail.com',
                    'role_id' => 1,
                    'password' => bcrypt('admin123'),
                ],
            ];

            foreach ($data as $d){
                User::query()->updateOrCreate($d);
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
