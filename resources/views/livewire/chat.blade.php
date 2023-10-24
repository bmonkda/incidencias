<div class="chat-system">
    <!-- Otras partes de tu interfaz de chat aquí -->

    <div class="chat-box-inner">
        <div class="chat-meta-user">
            <div class="current-chat-user-name">
                {{-- <span><img src="{{ asset('template/assets/img/avatar.jpg') }}" alt="dynamic-image"><span class="name"></span></span> --}}
            </div>
        </div>

        <div class="chat-conversation-box">
            <div id="chat-conversation-box-scroll" class="chat-conversation-box-scroll">
                <div class="chat" data-chat="person1">
                    @foreach ($messages as $message)
                        @if (Auth::user()->idusuario == $message->user_id)
                            <div class="bubble me">
                                {{ $message->content }}
                            </div>
                            <div class="conversation-info me">
                                <span>{{ $message->created_at }}</span>
                            </div>
                        @else
                            <div class="bubble you">
                                {{ $message->content }}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="chat-footer">
            <div class="chat-input">
                <form wire:submit.prevent="sendMessage" class="chat-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-message-square">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                    <input type="text" class="mail-write-box form-control" wire:model="newMessage"
                        placeholder="Escriba aquí su mensaje..." />
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>
