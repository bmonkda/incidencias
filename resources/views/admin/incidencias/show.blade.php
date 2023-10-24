@extends('template.layouts.page')

{{-- @section('styles')
    <link href="{{asset('template/assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/css/components/custom-counter.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('template/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endsection --}}


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('template/plugins/table/datatable/datatables-dark.css')}}">
    
    <link href="{{ asset('template/assets/css/apps/mailing-chat.css') }}" rel="stylesheet" type="text/css" />
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('template/plugins/table/datatable/dt-global_style-dark.css')}}"> --}}
    <link href="{{asset('template/assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/plugins/tagInput/tags-input.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('template/assets/css/detalle/detalle.css')}}" rel="stylesheet" type="text/css" />

@endsection


@section('content')
    <div class="row {{-- mt-5 --}}">
        {{-- <div class="col-xl-12 col-md-12 col-sm-12 col-12"> --}}
        <div class="col-md-5"">
            <h4>Detalles de la incidencia: {{ $incidencia->id }} </h4>
        </div>
        <div class="col-md-7"">
            <h4>Chat</h4>
        </div>
    </div>

<div class="row">
    <div class="col-md-5">

        @include('admin.incidencias.partials.detalle2')
        
        <a href="{{ route('admin.incidencias.index') }}" class="btn btn-sm btn-primary" title="Lista de Incidencias">Regresar</a>
        <a href="{{ route('admin.incidencias.edit', $incidencia) }}" class="btn btn-sm btn-secondary" title="Editar incidencia">Editar</a>

    </div>

    <div class="col-md-7">
        <div>
            {{-- Aquí abajo pendiente el chat --}}
            {{-- <h5 class="text-bold mt-4">Chat</h5> --}}
            @livewire('chat-list', ['incidencia' => $incidencia])
            @livewire('chat-form', ['incidencia' => $incidencia])
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{asset('template/plugins/counter/jquery.countTo.js')}}"></script>
    <script src="{{asset('template/assets/js/components/custom-counter.js')}}"></script>

    <script src="{{asset('template/assets/js/elements/tooltip.js')}}"></script>
    <script src="{{asset('template/plugins/table/datatable/datatables.js')}}"></script>
   {{--  <script>
        $('#zero-config')({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Mostrando pagina _PAGE_ de _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Buscar...",
                "sLengthMenu": "Cantidad de resgistros :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script> --}}

    <script>
        var tabla = document.getElementById("detalle");
        var celdas = tabla.getElementsByTagName("td");

        for (var i = 0; i < celdas.length; i++) {
        celdas[i].style.borderColor = "#FF0000"; // Cambia el color de los bordes de las celdas
        }
    </script>
    
    <script src="{{ asset('template/assets/js/apps/mailbox-chat.js') }}"></script>

@endsection
