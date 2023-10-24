<?php

namespace App\Http\Livewire;

use App\Models\Incidencia;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatForm extends Component
{
    public $usuario;
    // public $usuario;
    public $mensaje;
    public $incidencia;



    function mount()
    {
        $this->usuario = Auth::user();
        $this->mensaje = "";
        // $this->inc=$incidencia->id;
    }

    public function render()
    {

        return view('livewire.chat-form');
    }

    public function updated($field)
    {
        $this->validateOnly($field, [
            "usuario" => "required|min:3",
            "mensaje" => "required"
        ]);
    }

    public function enviarMensaje()
    {

        $this->validate([
            "usuario" => "required|min:3",
            "mensaje" => "required"
        ]);


        // $userId = $nombre;

        // dd($userId);

        Mensaje::create([

            "user_id" => $this->usuario->idusuario,
            "incidencia_id" => $this->incidencia->id,
            "contenido" => $this->mensaje
        ]);

        // Borra el texto del campo de mensaje después de enviarlo.
        $this->mensaje = "";

        $this->emit("mensajeEnviado");

        $datos = [
            "usuario" => $this->usuario->idusuario,
            "mensaje" => $this->mensaje,
            "incidenciaId" => $this->incidencia->id,
            "nombre" => Auth::user()->nombre,
        ];

        //dd($datos);

        // $this->emit("mensajeRecibido", $datos);

        // event(new \App\Events\EnviarMensajeEvent($this->nombre, $this->mensaje));
        event(new \App\Events\EnviarMensajeEvent($datos));
    }
}
