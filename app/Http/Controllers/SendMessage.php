<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendMessage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $data = $request->all();

        dd($data);
    }
}
