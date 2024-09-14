<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessage
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sender;
    public $message;

    /**
     * Create a new event instance.
     * 
     * @param string $sender
     * @param string $message
     */
    public function __contstruct($sender, $message) 
    {
        $this->sender = $sender;
        $this->message = $message;
    }
}