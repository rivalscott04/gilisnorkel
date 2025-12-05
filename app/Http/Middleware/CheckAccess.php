<?php

namespace App\Http\Middleware;

use Closure;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$access)
    {
        $akses = auth()->user()->has_permissions->contains($access);
        if($akses===false && !auth()->user()->is_admin()){
            abort(401);
        }

        return $next($request);
    }
}
