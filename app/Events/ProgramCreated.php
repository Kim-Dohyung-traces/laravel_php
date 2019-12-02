<?php
namespace App\Events;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
class ProgramCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(\App\Program $program)
    {
        $this->program = $program;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}