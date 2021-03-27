<?php

namespace App\Http\Middleware;

use App\Models\UserLog;
use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;


class LimitSession
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



        // 1. only logined user
        // 2. befroe logging
        // 3. logined user request count >= 1000
            // 3.1 block
            // 3.2 open

        // SELECT COUNT(id) FROM `user_logs` WHERE `user_id`='ekdls627' AND (
        // `created_at` >= '2021-03-26 00:00:00' and
        // `created_at` <'2021-03-27 00:00:00
        // )



        $response = $next($request);
        $loginedUser = Auth::user();


        if ($loginedUser === null) {
            return $response;
        } else {

            $logCount = UserLog::where([
                ['user_id', '=', $loginedUser->user_id],
                ['created_at', '>=', Carbon::now()->format('Y-m-d 00:00:00')],
                ['created_at', '<', Carbon::now()->addDays(1)->format('Y-m-d 00:00:00')]
            ])
            ->count();
            if($logCount>1000){
                throw new HttpResponseException(
                    response()->json([
                        'asdf' => false,
                        'errors' => 'Too many request'
                    ], 419)
                );
            } else{
                return $response;
            }



        }


    }
}
