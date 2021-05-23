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
     * @param Response $response
     * @return void
     */
    public function __construct(Response $response)
    {
        // Convierte en arreglo la respuesta para poder manipularla.
        $responseInfo = $response->json();

        // Si la respuesta no tuvo errores...
        if ($responseInfo['meta'] === 'generate') {
            // Devuelve la cantidad de guías usando el método del Trait
            // CountsShipments y la guarda en la instancia. 
            $this->guidesCounter = $this->countShipments();
        }
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
