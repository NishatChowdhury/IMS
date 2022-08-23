<?php

namespace App\Http\Middleware;

use App\Models\Backend\Permission;
use App\Models\Backend\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CheckPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();
//        dd($routeName);
        if($routeName == 'admin'){ // for dashboard
            return $next($request);
        }

        $roles = auth()->user()->roles;
        foreach($roles as $role){
            foreach($role->permissions as $permission){
                if($permission->name == $routeName){
                    return $next($request);
                }
            }
        }

        return $next($request);
        abort(403,"You Don't Have Permission On This Page");
    }
}
