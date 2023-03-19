<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function history()
    {
        return response()->json([
            'status' => 'ok',
            'message' => '',
            'data' => [
                [
                    'id' => '000',
                    'content' => 'hello sir, may i help you?',
                    'time' => date('M d, g:i a'),
                ],
            ],
        ]);
    }
}