<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Helpers\ApiResponse;

class AuthApiController extends Controller
{
    public function login(Request $request) 
    {
        $credentials = $request->only('email', 'password');

        if($request->get('email') == null || $request->get('password') == null) {
            return ApiResponse::error('Email and Password are required', 400);
        }

        $token = JWTAuth::attempt($credentials);

        if(!$token) {
            return ApiResponse::error('Invalid Credentials', 401);
        };

        return ApiResponse::success(['token' => $token], 'Login Successful');
    }
}
