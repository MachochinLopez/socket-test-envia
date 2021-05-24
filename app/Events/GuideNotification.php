<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

use App\Traits\CountsShipments;
use Illuminate\Http\Client\Response;

class GuideNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels, CountsShipments;

    /**
     * Variable a la que podemos acceder para indicar la
     * cantidad de guías creadas este mes.
     * 
     * @var int
     */
    public $guidesCounter;

    /**
     * Create a new event instance.
     *
     * @param int $guidesCounter
     * @return void
     */
    public function __construct($guidesCounter)
    {
        $this->guidesCounter = $guidesCounter;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('notifications');
    }

    public function broadcastAs()
    {
        return 'guide-notification';
    }
}
