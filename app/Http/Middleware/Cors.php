<?php

namespace App\Http\Middleware;

use Closure;
use App;

class Cors
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
        if (App::environment('local')) {
            return $next($request)
                            ->header('Access-Control-Allow-Origin', '*');
        }  
        
        return $next($request);        
    }
}
