<?php

namespace App\Http\Middleware;

use Closure;

class Cors {

    public function handle($request, Closure $next) {

    //    if (in_array(env('APP_ENV'), ['local', 'dev'])) {
            
            return $next($request)
                            ->header('Access-Control-Allow-Origin', '*')
                            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                            ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding, X-Auth-Token, content-type');
  //      }   
        
        
//        return $next($request);
        
    }

}
