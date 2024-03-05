<?php

namespace App\Http\Middleware;

use Closure;
use Auth;


class LoginUserCheck
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
        $loginId = Auth::id();
        $requestId = $request->id;
        if ($loginId != $requestId) {
            return redirect('/login');
         }

        return $next($request);
    }
}
