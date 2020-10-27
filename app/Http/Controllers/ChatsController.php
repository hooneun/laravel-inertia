<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ChatsController extends Controller
{
    public function index()
    {
        return Inertia::render('Chat/Index');
    }

    public function fetchMessage()
    {
        return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required'
        ]);

        $user = Auth::user();
        $message = $user->messages()->create([
            'message' => $request->message,
        ]);

        broadcast(new MessageSent($user, $message))->toOthers();

        return response()->json([
            'status' => 'OK',
        ], Response::HTTP_OK);
    }
}
