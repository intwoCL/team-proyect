<?php

namespace App\Http\Middleware;

use Closure;

class UserAccess
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (auth('user')->check()){
      return $next($request);   
    }
    return redirect('/');
    // return redirect()->route('auth.usuario.login')->with('danger','Usuario deshabilitado.'); 
  }
}
