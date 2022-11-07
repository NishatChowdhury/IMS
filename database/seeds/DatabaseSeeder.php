<?php

namespace Database\Seeders;

use App\Models\Backend\Module;
use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use Illuminate\Database\Seeder;
use Database\Seeder\AcademicClassSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AccountsSeeder::class,
            AcademicClassSeeder::class,
        ]);
    }
}
