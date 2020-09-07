<?php

namespace App\Http\Middleware;

use Closure;

class RolesAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$roles)
    {
      // if (auth('user')->check()){
        return $next($request);   
      // }
      // return redirect('/');
    }
}
