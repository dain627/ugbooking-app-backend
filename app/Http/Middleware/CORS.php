<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     // header('Access-Control-Allow-Origin','*');
    //     // header('Access-Control-Allow-Methods','GET, PUT, POST, DELETE, OPTIONS');
    //     // header('Access-Control-Allow-Credentials','Content-Type, Authorization');
    //     // header('Access-Control-Allow-Origin: ' ');
    //     // header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    //     // header('Access-Control-Allow-Credentials: true');v

    // //   header('Access-Control-Allow-Origin', '*');
    // //   header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    // //   header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
    // //   return $next($request)
    // //   ->header('Access-Control-Allow-Origin', '*')
    // //   ->header('Access-Control-Allow-Methods','GET, PUT, POST, DELETE, OPTIONS')
    // //   ->header('Access-Control-Allow-Credentials','X-Requested-With, Content-Type, X-Token-Auth, Authorization');
    // // }
}
