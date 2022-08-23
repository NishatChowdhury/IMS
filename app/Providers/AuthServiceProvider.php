<?php

namespace App\Providers;

use App\Models\Backend\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('ims',function($user){
            return $user->module == 1;
        });

        Gate::define('cms',function($user){
            return $user->module == 0;
        });

        Gate::define('middleware-passed',function($user,$route){
            $p = Permission::query()
                ->where('name',$route)
                ->with('roles')
                ->first();

            $roles = $p->roles;
            foreach ($roles as $role){
                $userRole = $user->roles->first();
                if($userRole->id == $role->id){
                    return true;
                }
            }
        });
    }
}
