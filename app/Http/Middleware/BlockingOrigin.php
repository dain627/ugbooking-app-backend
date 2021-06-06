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
// 백엔드에서 사용하는 서버포트와 프론트엔드에서 사용하는 포트를 제외한 서드파티접근 블락. cors ?
