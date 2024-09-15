<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //Display the chat interface
    public function index()
    {
        return view('chat'); //Load the chat interface view
    }

    // Send a message and broadcast it
    public function sendMessage(Request $request)
    {
        // Validate the request data (e.g. message content should not be empty)
        $request->validate([
            'message' => 'required|string',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        $message = [
            'sender' => $user->name,
            'message' => $request->message,
        ];

        // Broadcast the message to others
        broadcast(new MessageSent($message))->toOthers();


        // Return a response indicating the message was sent
        return response()->json(['message' => 'Message sent']);
    }
}
