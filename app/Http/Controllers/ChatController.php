<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatMessage;

class ChatController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate the request data (e.g. message content should not be empty)
        $request->validate([
            'message' => 'required|string',
        ]);

        // Trigger the ChatMessage event with sender's name and message content
        event(new ChatMessage($request->user()->name, $request->message));

        // Broadcast the message to others
        broadcast(new MessageSent($message))->toOthers();


        // Return a response indicating the message was sent
        return response()->json(['message' => 'Message sent']);
    }
}
