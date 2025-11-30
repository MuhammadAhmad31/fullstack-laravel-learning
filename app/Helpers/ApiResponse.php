<?php

namespace App\Helpers;

class ApiResponse
{
    public static function success($data = null, $message = 'Success', $code = 200)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error($message = 'Error', $code = 400)
    {
        return response()->json([
            'code' => $code,
            'message' => $message,
            'data' => null,
        ], $code);
    }
}
