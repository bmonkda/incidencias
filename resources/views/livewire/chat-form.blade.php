<div>
    <div class="form-group">
        {{-- <h6 class="mt-3"><strong>{{ $usuario->nombre }}</strong></h6> --}}
        {{-- <small>{{ $nombre }}</small> --}}
        {{-- <input type="text" name="" id="nombre" class="form-control" wire:model="nombre"> --}}
        @error('nombre')
            <small class="text-danger"> {{ $message }}
            @enderror
    </div>

{{-- comentando esto para adaptar el chat de la plantilla --}}
    <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <input type="text" name="" id="mensaje" class="form-control" wire:model="mensaje">
        @error('mensaje')
            <small class="text-danger"> {{ $message }}
            @enderror
    </div>

    <div class="btn btn-primary" wire:click='enviarMensaje'>Enviar mensaje</div>

{{-- =========================================================================================== --}}
    {{-- @include('incidencias.partials.form', ['incidencia' => $incidencia]) --}}
    
    {{-- @include('template.layouts.apps_chat')   --}}


    {{-- Mensaje de alerta --}}
    <div style="position: absolute; top: 10px; right: 10px;" class="alert alert-success collapse mt-3" role="alert"
        id="avisoSuccess">
        Se ha enviado
    </div>

    <script>
        // esto se recibe en JS cuando lo emite el componente
        // el evento "mensajeEnviado"
        //en la funcion (anonima) se pueden mandar parametros para saber el mensaje enviado, usuario que lo hizo, tipo de mensaje
        window.livewire.on('mensajeEnviado', () => {
            // mostrar el aviso
            $("#avisoSuccess").fadeIn("slow");
            //ocultar el aviso a los 3 seg
            setTimeout(() => {
                $("#avisoSuccess").fadeOut("slow");
            }, 3000);
        });
    </script>

</div>
