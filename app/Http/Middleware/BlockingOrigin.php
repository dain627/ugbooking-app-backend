<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\IPWhiteList;
use Illuminate\Http\Exceptions\HttpResponseException;

class BlockingOrigin
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

        $serverVariables = $request->server();

        $canAccessApp = IPWhiteList::where('whitelist_ip', $serverVariables['REMOTE_ADDR'])->exists();

        if ($canAccessApp) {
            return $next($request);

        } else {
            throw new HttpResponseException(
                response()->json([
                    'asdf' => false,
                    'errors' => 'Blocked ip address'
                ], 401)
            );
        }


    }
}
