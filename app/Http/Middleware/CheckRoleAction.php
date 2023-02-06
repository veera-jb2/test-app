<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CheckRoleAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = !empty(Auth::user()->role) ? Auth::user()->role->role_name : '';
        if(!empty($role)){
          $routes = config('constant.'.$role.'_routes');
          if(in_array($request->route()->getName(),$routes)){
            return $next($request);
          }else{
            return redirect()->route('access-denied');
          }
        }else{
            return redirect()->route('access-denied');
        }
    }
}
