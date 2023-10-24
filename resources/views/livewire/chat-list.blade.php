<div>
    {{-- <h5 class="mt-3"><strong>Lista de mensajes</strong></h5> --}}

    {{-- @foreach ($conv as $mensaje)
        @if ($mensaje->user_id === auth()->id())
            <div class="message message-right">
                <span class="message-content">{{ $mensaje->user->nombre }} - {{ $mensaje->contenido }}</span>
            </div>
        @else
            <div class="message message-left">
                <span class="message-content">{{ $mensaje->user->nombre }} - {{ $mensaje->contenido }}</span>
            </div>
        @endif
    @endforeach --}}


    <div class="message-container">
        @foreach ($conv as $mensaje)
            <div class="message @if ($mensaje->user_id === auth()->id()) message-right @else message-left @endif">
                <div class="message-header">
                    <div class="avatar">
                        <!-- Agrega aquí la lógica para mostrar el avatar del usuario -->
                        <img src="{{ asset('template/assets/img/avatar' . (Auth::user()->cargoxunidad()->sexo === 'M' ? '.jpg' : '.jpg')) }}" alt="{{ $mensaje->user->nombre }}" />
                    </div>
                    <div class="user-name">
                        {{ $mensaje->user->nombre }}
                    </div>
                </div>
                <div class="message-content">
                    {{ $mensaje->contenido }}
                </div>
                <div class="message-date">
                    {{ $mensaje->created_at->format('d/m/Y h:i A') }} <!-- Formatea la fecha como desees -->
                </div>
            </div>
        @endforeach
        <div id="scroll-marker"></div> <!-- Marcador de desplazamiento -->
    </div>
    

    <link href="{{asset('template/assets/css/chat/chat.css')}}" rel="stylesheet" type="text/css" />

    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('58ced3321a236d368b82', {
            cluster: 'us2'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('chat-event', function(data) {
            //   alert(JSON.stringify(data));
            window.livewire.emit('mensajeRecibido', data);
        });


        // Luego de agregar un nuevo mensaje, asegúrate de desplazar la barra al marcador
        window.livewire.on('mensajeRecibido', () => {
            const scrollMarker = document.getElementById('scroll-marker');
            scrollMarker.scrollIntoView({ behavior: 'smooth', block: 'end' });
        });

    </script>

</div>
