@extends('template.layouts.page')


@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('template/plugins/table/datatable/datatables-dark.css')}}">

<link href="{{asset('template/assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('template/plugins/tagInput/tags-input.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('scripts_defer')

@endsection

@if(session('info'))
<div class="alert alert-success">
    {{ session('info') }}
</div>
@endif

@section('content')

<div class="row mb-2">
    <div class="">
        <h2>Listado de incidencias Asignadas a Mi</h2>
    </div>
</div>
<div class="table-responsive mb-4">
    <div class="col-md-12">
        <a href="{{route('incidencias.create')}}" class="btn btn-primary btn-lg float-md-right" role="button"
            aria-pressed="true">Crear incidencias</a>
    </div>
</div>

<div class="table-responsive">
    <table id="zero-config" class="table mb-4 contextual-table">
        <thead>
            <tr class="table-dark">
                <th class="text-center text-dark">Item</th>
                <th class="text-center text-dark">Nº Incidencia</th>
                <th class="text-center text-dark">Titulo</th>
                <th class="text-center text-dark">Descripcion</th>
                <th class="text-center text-dark">Status</th>
                <th class="text-center text-dark">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($incidencias as $incidencia)
            <tr class="table-primary">
                <td class="text-center text-dark">{{$loop->iteration}}</td>
                <td class="text-center text-dark">{{$incidencia->id}}</td>
                <td class="text-dark">{{$incidencia->titulo}}</td>
                <td class="text-dark">{{$incidencia->descripcion}}</td>
                <td class="text-center"><span class="badge outline-badge-dark"
                        style="background-color: {{$incidencia->statu->color2}}"> {{$incidencia->statu->nombre}} </span>
                </td>
                <td class="text-center">
                    <div class="d-flex justify-content-center align-items-center">
                        <a class="bs-tooltip" href="{{route('incidencias.show', $incidencia)}}" title="Mostrar"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#0960DE" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-eye">
                                <path
                                    d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm0 16c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm0-9c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z">
                                </path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg></a>
                        <a class="bs-tooltip" href="{{route('incidencias.edit', $incidencia->id)}}" title="Editar"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="#1C10F4" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-edit">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg><span class="icon-name"></span> </a>
                        <form class="delete-form" action="{{route('incidencias.destroy', $incidencia)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bs-tooltip" title="Eliminar"
                                style="background: none; border: none; cursor: pointer;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="#FF0000" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                </svg>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
                // "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sInfo": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "sSearchPlaceholder": "Buscar...",
                "sLengthMenu": "Cantidad de resgistros :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
</script>

@endsection