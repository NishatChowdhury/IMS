<?php

use App\Models\Backend\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SeedRolePermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = \App\Models\Backend\Permission::query()->get('id');
        $user = \App\Models\Backend\User::where('email', 'admin@gmail.com')->first();
        $role = Role::create([
             'name' => 'Super Admin',
             'description' =>'Super Admin Description'
         ]);
        $user->roles()->sync($role->id);
        $role->permissions()->sync($permissions);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
