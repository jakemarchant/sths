<?php
namespace App\Http\Middleware;
use Closure;

class RedirectIfNotMember
{

    public function handle($request, Closure $next, $guard="member")
    {
        if(!auth()->guard($guard)->check()) {
            return redirect('/members/login');
        }

        return $next($request);
    }

}
