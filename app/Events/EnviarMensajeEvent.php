<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnviarMensajeEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $usuario;
    public $mensaje;
    public $incidenciaId;
    public $nombre;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    // public function __construct($usuario, $mensaje)
    public function __construct($datos)
    {
        $this->usuario = $datos['usuario'];
        $this->nombre = $datos['nombre'];
        $this->mensaje = $datos['mensaje'];
        $this->incidenciaId = $datos['incidenciaId'];
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return 'chat-channel';
    }

    public function broadcastAs()
    {
        return 'chat-event';
    }

}
