<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMessageReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
 
    protected $message;
    protected $request;
 
    public function __construct($request)
    {
        $this->request = $request;
 
    }
 
    public function broadcastOn()
    {
 
        return new Channel('teamchat');
 
    }

    public function broadcastWith()
    {
 
        return [
            'message' => $this->request['message'],
            'send' => $this->request['send'],
            'receive' => $this->request['receive'],
            'created_at' => now()->toIso8601String(), 
        ];
    }
 
    /**
     * イベントブロードキャスト名
     *
     * @return string
     */
    public function broadcastAs()
    {
 
        return 'chat_event';
    }
}
