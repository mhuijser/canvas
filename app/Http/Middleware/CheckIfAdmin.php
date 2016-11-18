<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\User;

class CheckIfAdmin
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
        if (! User::isAdmin(Auth::user()->role)) {
            return redirect('/admin');
        }

        return $next($request);
    }
}
