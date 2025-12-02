<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            return response()->json([
                'message' => 
                    $e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException ? 'Token expired' :
                    ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException ? 'Token invalid' : 'Token not found')
            ], 401);
        }

        return $next($request);
    }
}
