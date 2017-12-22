<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class RedirectIfCustomerAuthenticated
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

        //If request comes from logged in seller, he will
        //be redirected to seller's home page.
        if (Auth::guard('customer')->check()) {
            return redirect('/');
        }
        return $next($request);
    }
}
