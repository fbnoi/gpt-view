<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function ui(string $id)
    {
        return view("chats.session", [
            'ident' => $id,
        ]);
    }

    public function chat()
    {
        return response()->json([
            'status' => 'ok',
            'message' => '',
            'data' => [
                'message' => 'hello world',
            ],
        ]);
    }

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