<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
//        $token = $request->bearerToken();
//
//        echo "hello this works";
//
//        // verify the token
//        try {
//            $user = JWTAuth::parseToken()->authenticate();
//        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
//            return response([
//                'message' => 'Token is Invalid',
//            ], 401);
//        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
//            return response([
//                'message' => 'Token is Expired',
//            ], 401);
//        } catch (\Exception $e) {
//            return response([
//                'message' => 'Authorization Token not found',
//            ], 401);
//        }

        return $next($request);
    }
}
