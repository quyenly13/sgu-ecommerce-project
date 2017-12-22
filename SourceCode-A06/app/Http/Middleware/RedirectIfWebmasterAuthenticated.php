<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfWebmasterAuthenticated
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
          if (Auth::guard()->check()) {
            return redirect('/home');
        }

        //If request comes from logged in seller, he will
        //be redirected to seller's home page.
        if (Auth::guard('webmaster')->check()) {
            return redirect('/webmaster');
        }
        return $next($request);
    }
}
