<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthenticated
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
    if (Auth::check()) {
      // allow user and admin to proceed with request

      if (Auth::user()->isAdmin() || Auth::user()->isUser()) {
        return $next($request);
      }
    }
    abort(404);  // for other user throw 404 error
  }
}
