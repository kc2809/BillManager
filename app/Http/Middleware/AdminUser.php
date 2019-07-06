<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;

class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $requests
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(!$request->user()->isAdmin()) {
            return redirect('unauthorization');
        }

        return $next($request);
    }
}
