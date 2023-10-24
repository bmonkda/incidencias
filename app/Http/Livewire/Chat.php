<?php

namespace App\Http\Livewire;

use App\Models\Mensaje;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Chat extends Component
{

    public $messages;
    public $newMessage;

    public function render()
    {

        // Cargar los mensajes existentes desde tu modelo (por ejemplo, Message)
        $this->messages = Mensaje::all();

        return view('livewire.chat');
    }

    public function sendMessage()
    {
        // Guardar el nuevo mensaje en la base de datos
        Mensaje::create([
            'contenido' => $this->newMessage,
            // Agrega otras columnas según tu modelo de datos
            'user_id' => Auth::user()->idusuario, 
            'incidencia_id' => 301, 
        ]);

        // Limpiar el campo de entrada
        $this->newMessage = '';

        // Actualizar la vista con los nuevos mensajes
        $this->render();
    }
    
}
