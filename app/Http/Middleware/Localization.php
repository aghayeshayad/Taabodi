<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Route;
use Illuminate\Support\Arr;

class Localization
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
        // The request already contains the language code
        return $next($request);
    }
}
