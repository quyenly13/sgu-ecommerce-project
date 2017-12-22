<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AuthenticateWebmaster
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
 	if (! Auth::guard('webmaster')->check()) {
            return redirect('/webmaster/login');
        }

        return $next($request);
    }
}
