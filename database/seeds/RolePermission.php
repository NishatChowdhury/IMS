<?php

namespace Database\Seeders;

use App\Models\Backend\Module;
use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use Illuminate\Database\Seeder;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // role create
         $role = Role::create(['name' => 'writer']);
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
                     'slug' => $permission,
                     'module_id' => $module->id
                 ])->roles()->sync($role->id);
             }
         }
    }
}
