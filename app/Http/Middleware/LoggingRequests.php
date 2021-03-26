<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;

class LoggingRequests
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
        $response = $next($request);
        $serverVariables = $request->server();

        $log = [
            'request_ip_address' => $serverVariables['REMOTE_ADDR'],
            'session_id' => getmypid(),
            'user_id' => Auth::user()->user_id ?? null,
            'action' => $serverVariables['REQUEST_METHOD'],
        ];

        UserLog::create($log);
        // UserLog::create([
        //     'request_ip_address',
        //     'session_id',
        //     'user_id',
        //     'action'
        // ]);
        return $response;
    }
}
