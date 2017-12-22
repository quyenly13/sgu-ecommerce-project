<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


class AuthenticateCustomer
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
       if (!Auth::guard('customer')->check()) {
            return redirect('/dang-nhap');
        }
        return $next($request);
    }
}
