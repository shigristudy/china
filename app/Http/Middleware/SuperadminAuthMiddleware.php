<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SuperadminAuthMiddleware
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
        if(Auth::guard('superadmin')->guest()) {
            if($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized', 401);
            } else {
                return redirect()->guest('superadmin/login');
            }
        }
        return $next($request);
    }
}
