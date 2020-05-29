<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{


    public function handle($request, Closure $next)
    {
        if (! Auth::guard('admin')->check()) {
            return redirect()->route('get.login');
        }

        return $next($request);
    }
}
