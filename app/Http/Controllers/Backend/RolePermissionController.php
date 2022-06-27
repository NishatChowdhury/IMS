<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Module;
use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RolePermissionController extends Controller
{
    function roleIndex(){
        $roles = Role::all();
        return view('admin.userManagement.role.index', compact('roles'));
    }
    function roleCreate(){
        $modules = Module::all();
          $permissionsCount = Permission::query()
//                                        ->selectRaw(\DB::raw('count(*) as C'))
//                                        ->orderBy('C')
                                        ->orderBy('group_name', 'ASC')
                                        ->get()
                                        ->groupBy('group_name');
//        return  $permissionsCount = Permission::query()
//                                        ->groupBy('group_name')
//                                        ->orderBy(\DB::raw('count(group_name)', 'DESC'))
//                                        ->get()
//                                        ->groupBy('group_name')
//            ;





        return view('admin.userManagement.role.create', compact('modules','permissionsCount'));
    }
    public function roleStore(Request $req){
        $req->validate([
            'name' => 'required|unique:roles'
        ]);
        Role::create(['name' => $req->name, 'description' => $req->name.' Description'])->permissions()->sync($req->permission);
        return redirect()->route('role.index');
    }
    function roleEdit(Role $role){
//        return $role;
        $modules = Module::all();
         $permissionsCount = Permission::query()
//                                        ->selectRaw(\DB::raw('count(*) as C'))
//                                        ->orderBy('C')
                                        ->orderBy('group_name', 'ASC')
                                        ->get()
                                        ->groupBy('group_name');
        return view('admin.userManagement.role.edit', compact('role','modules','permissionsCount'));
    }

    function roleUpdate(Request $req){
        $req->validate([
            'name' => 'required|unique:roles,name,'.$req->id
        ]);
        $role = Role::find($req->id);
        $role->update([
            'name' => $req->name
        ]);
        $role->permissions()->sync($req->permission);
        return back();
    }

    /// create Module section
    function moduleCreate(){
        return view('admin.userManagement.module.create');
    }
    function moduleStore(Request $req){
//        return $req->permission;
        $req->validate([
            'name' => 'required|unique:modules'
        ]);
        $module = Module::create([
            'name' => $req->name
        ]);
        foreach ($req->permission as $p){
            Permission::create([
                'module_id' => $module->id,
                'name' => $p,
            ]);
        }
        return back();
    }
}
