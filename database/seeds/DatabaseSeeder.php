<?php

namespace Database\Seeders;

use App\Models\Backend\Module;
use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // role create
        $this->call(RawAttendanceSeeder::class);
         $role = Role::create([
                'name' => 'writer',
                'description' => 'writer description',
             ]);
         // permission create

         $permissionGroup = [
             [
                 'module_name' => 'blog',
                 'permissions' => [
                     'blog.index',
                     'blog.create',
                     'blog.edit',
                     'blog.delete',
                 ],
             ],
             [
                 'module_name' => 'product',
                 'permissions' => [
                     'product.index',
                     'product.create',
                     'product.edit',
                     'product.delete',
                 ],
             ],
             [
                 'module_name' => 'admin',
                 'permissions' => [
                     'admin.index',
                     'admin.create',
                     'admin.edit',
                     'admin.delete',
                 ],
             ],
         ];


         foreach ($permissionGroup as $permissionM){
             $module = Module::create([
                 'name' => $permissionM['module_name']
                ]);

             foreach($permissionM['permissions'] as $permission){
                 Permission::create([
                     'name' => $permission,
                     'module_id' => $module->id
                 ])->roles()->attach($role->id);
             }
         }
    }
}
