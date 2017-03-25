<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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

        if (JWTAuth::parseToken()->authenticate()->codigo_tipo_usuario == '1') {
            return $next($request);
        }

        return response()->json(['error' => 'Not Authorized'], 403);

    }
}
