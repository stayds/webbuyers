<?php

namespace App\Http\Middleware;

use Closure;

class BackInvalidate
{


    public function handle($request, Closure $next)
    {
        return $next($request);
    }

}
