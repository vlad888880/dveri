<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class Administrator
{
  /**
   * Обработка входящего запроса.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (Auth::user() == null) {
      return redirect()->route('home');
    }else{
      if (Auth::user()['user_status'] != 1){
        return redirect()->route('welcome');
      }
    }
    return $next($request);
  }
}