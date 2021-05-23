<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreflightResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->getMethod() === "OPTIONS") {
            $request->setMethod('POST');
            return $next($request);
        }

        return $next($request);
    }
}
