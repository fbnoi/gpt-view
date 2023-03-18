<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ChatController extends Controller
{
    public function ui(string $ident): View
    {
        return view("chats.session", [
            'ident' => $ident,
        ]);
    }

    public function chat()
    {
        return response()->json([
            'status' => 'ok',
            'message' => '',
            'data' => [
                'message' => "hello world",
            ],
        ]);
    }
}