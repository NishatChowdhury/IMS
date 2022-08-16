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

        if($routeName == 'admin'){ // for dashboard
            return $next($request);
        }

        $p = Permission::query()
            ->where('name',$routeName)
            ->with('roles')
            ->first();

        if(!$p){
            abort(404);
        }

        $roles = $p->roles;
        foreach ($roles as $role){
            $userRole = auth()->user()->roles->first();
            if($userRole->id == $role->id){
                return $next($request);
            }
        }

        //return $next($request);
        abort(403,"You Don't Have Permission On This Page");
    }
}
