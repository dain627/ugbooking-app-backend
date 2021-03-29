<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Exceptions\HttpResponseException;

class Authenticate extends Middleware
{
    /**This applications uses JSON Web Token (JWT) to handle authentication.
     * The token is passed with each request using the Authorization header with Token scheme.
     * The JWT authentication middleware handles the validation and authentication of the token.
     */

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        throw new HttpResponseException(

            response()->json([
                'asdf' => false,
                'errors' => 'Un Authorized'
            ], 401)
        );
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
    }
}
