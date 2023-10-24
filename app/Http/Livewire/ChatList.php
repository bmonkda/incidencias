<?php

namespace App\Http\Livewire;

use App\Models\Mensaje;
use Livewire\Component;

class ChatList extends Component
{

    public $incidencia;

    public $mensajes;

    public $usuario;

    protected $listeners =["mensajeRecibido"];

    function mount() 
    {
        $this->mensajes = [];
    }

    function mensajeRecibido($mensaje) 
    {
        //dd($mensaje);
        //darnos por notificados que recibimos un mensaje e ir a la BD a buscar los ultimos mensajes, detalles
        $this->mensajes[] = $mensaje;
    }

    public function render()
    {
        $conv = Mensaje::where('incidencia_id', $this->incidencia->id)->get();
        return view('livewire.chat-list', compact('conv'));
    }
}
