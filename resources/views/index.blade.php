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
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('template/plugins/table/datatable/dt-global_style-dark.css')}}"> --}}
    <link href="{{asset('template/assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/plugins/tagInput/tags-input.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts_defer')

@endsection


@section('content')

<div class="row mt-5">
    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
        <h4>Bienvenido al Sistema de Incidencias</h4>
    </div>
</div>
{{-- <div class="table-responsive">
    <table id="zero-config" class="table mb-4 contextual-table">
        <thead>
        <tr class="table-dark">
            <th class="text-dark">Nº</th>
            <th class="text-dark">Titulo</th>
            <th class="text-dark">Descripcion</th>
            <th class="text-dark">Status</th>
            <th class="text-dark">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incidencias as $incidencia)
        <tr class="table-primary">
            <td class="text-dark">{{$incidencia->id}}</td>
            <td class="text-dark">{{$incidencia->titulo}}</td>
            <td class="text-dark">{{$incidencia->descripcion}}</td>
            <td class="text-center"><span class="badge outline-badge-dark" style="background-color: {{$incidencia->statu->color2}}"> {{$incidencia->statu->nombre}} </span></td>
            <td>
                <a class="bs-tooltip" href="{{route('incidencias.edit', $incidencia->id)}}" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f0f0f0" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name"></span> </a>
                <a class="bs-tooltip" href="{{route('incidencias.destroy', $incidencia->id)}}" title="Eliminar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div> --}}

@endsection

@section('scripts')
    <script src="{{asset('template/plugins/counter/jquery.countTo.js')}}"></script>
    <script src="{{asset('template/assets/js/components/custom-counter.js')}}"></script>

    <script src="{{asset('template/assets/js/elements/tooltip.js')}}"></script>
    <script src="{{asset('template/plugins/table/datatable/datatables.js')}}"></script>
    <script>
        $('#zero-config').DataTable({
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
    </script>

@endsection
