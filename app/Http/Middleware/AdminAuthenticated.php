<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
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
      // if user is not admin take him to his dashboard
      if (Auth::user()->isUser()) {
        session()->flash('info',  "Vous n'avez pas les droits pour accéder à cette fonctionnalité");
        return redirect(route('events.index'));
      }
      // allow admin to proceed with request
      else if (Auth::user()->isAdmin()) {
        return $next($request);
      }
    }
    abort(404);  // for other user throw 404 error
  }
}
