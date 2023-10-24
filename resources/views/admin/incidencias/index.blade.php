@extends('template.layouts.page')
@section('styles')
    <link href="{{asset('template/assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/css/components/custom-counter.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('template/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="row">
    <div class="col">
        <div class="infobox-3" style="background-color: #d1d1d1">
            <div class="info-icon">
                <img style="width: 50px; height: 50px"
                     src="{{asset('template/assets/img/favicon.ico')}}"
                     alt="Grapefruit slice atop a pile of other slices">
            </div>
            <h5 class="info-heading">Incidencias</h5>
            <div class="counter-container">
                <div class="counter-content">
                    {{-- <h1 class="s-counter1 s-counter">{{$incidenciascreadascount}}</h1> --}}
                    <h1 class="s-counter1 s-counter">{{ $incidencias }}</h1>
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <span class="badge outline-badge-primary"> {{-- {{$estatuscreado->nombre}} --}} CREADA </span>
            </button>

            {{-- modal incidncias creadas --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Listado de incidencias creadas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incidencias as $creada)
                                        <tr>
                                            <td>{{$creada->id}}</td>
                                            <td>{{$creada->titulo}}</td>
                                            <td>{{$creada->descripcion}}</td>
                                            <td class="text-center"><span class="badge outline-badge-primary"> {{$creada->statu->nombre}} </span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="infobox-3" style="background-color: rgba(226,160,63,0.57)">
            <div class="info-icon">
                <img style="width: 50px; height: 50px; color: white"
                     src="{{asset('template/assets/img/favicon.ico')}}"
                     alt="Grapefruit slice atop a pile of other slices">
            </div>
            <h5 class="info-heading">Incidencias</h5>
            <div class="counter-container">
                <div class="counter-content">
                    {{-- <h1 class="s-counter2 s-counter">{{$incidenciasesperacount}}</h1> --}}
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                {{-- <span class="badge badge-warning"> {{$estatusespera->nombre}} </span> --}}
            </button>

            {{-- modal incidncias en espera --}}
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Listado de incidencias en Espera</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incidencias as $creada)
                                        <tr>
                                            <td>{{$creada->id}}</td>
                                            <td>{{$creada->titulo}}</td>
                                            <td>{{$creada->descripcion}}</td>
                                            <td class="text-center"><span class="badge badge-warning"> {{$creada->statu->nombre}} </span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="infobox-3" style="background-color: rgba(27,85,226,0.57)">
            <div class="info-icon">
                <img style="width: 50px; height: 50px"
                     src="{{asset('template/assets/img/favicon.ico')}}"
                     alt="Grapefruit slice atop a pile of other slices">
            </div>
            <h5 class="info-heading">Incidencias</h5>
            <div class="counter-container">
                <div class="counter-content">
                    {{-- <h1 class="s-counter3 s-counter">{{$incidenciasasignadocount}}</h1> --}}
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                {{-- <span class="badge badge-primary"> {{$estatusasignado->nombre}} </span> --}}
            </button>

            {{-- modal incidncias asignadas --}}
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Listado de incidencias Asignadas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incidencias as $creada)
                                        <tr>
                                            <td>{{$creada->id}}</td>
                                            <td>{{$creada->titulo}}</td>
                                            <td>{{$creada->descripcion}}</td>
                                            <td class="text-center"><span class="badge badge-primary"> {{$creada->statu->nombre}} </span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="infobox-3" style="background-color: rgba(141,191,66,0.57)">
            <div class="info-icon">
                <img style="width: 50px; height: 50px"
                     src="{{asset('template/assets/img/favicon.ico')}}"
                     alt="Grapefruit slice atop a pile of other slices">
            </div>
            <h5 class="info-heading">Incidencias</h5>
            <div class="counter-container">
                <div class="counter-content">
                    {{-- <h1 class="s-counter4 s-counter">{{$incidenciascerrarecount}}</h1> --}}
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                {{-- <span class="badge badge-success"> {{$estatuscerrare->nombre}} </span> --}}
            </button>

            {{-- modal incidncias cerrada (resuelta) --}}
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Listado de incidencias Cerradas (Resueltas)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incidencias as $creada)
                                        <tr>
                                            <td>{{$creada->id}}</td>
                                            <td>{{$creada->titulo}}</td>
                                            <td>{{$creada->descripcion}}</td>
                                            <td class="text-center"><span class="badge badge-success"> {{$creada->statu->nombre}} </span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="infobox-3"style="background-color: rgba(231,81,90,0.57)">
            <div class="info-icon">
                <img style="width: 50px; height: 50px"
                     src="{{asset('template/assets/img/favicon.ico')}}"
                     alt="Grapefruit slice atop a pile of other slices">
            </div>
            <h5 class="info-heading">Incidencias</h5>
            <div class="counter-container">
                <div class="counter-content">
                    {{-- <h1 class="s-counter5 s-counter">{{$incidenciascerranocount}}</h1> --}}
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
                {{-- <span class="badge badge-danger"> {{$estatuscerrano->nombre}} </span> --}}
            </button>

            {{-- modal incidncias cerrada (no resuelta) --}}
            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Listado de incidencias Cerradas (No Resueltas)</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-4">
                                    <thead>
                                    <tr>
                                        <th>Nº</th>
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($incidencias as $creada)
                                        <tr>
                                            <td>{{$creada->id}}</td>
                                            <td>{{$creada->titulo}}</td>
                                            <td>{{$creada->descripcion}}</td>
                                            <td class="text-center"><span class="badge badge-danger"> {{$creada->statu->nombre}} </span></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
        <h4>Listado de incidencias en espera</h4>
    </div>
</div>
<div class="table-responsive">
    <table class="table mb-4 contextual-table">
        <thead>
        <tr class="table-dark">
            <th class="text-dark">Nº</th>
            <th class="text-dark">Titulo</th>
            <th class="text-dark">Descripcion</th>
            <th class="text-center text-dark">Status</th>
            <th class="text-center text-dark">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($incidencias as $incidencia)
        <tr class="table-primary">
            <td class="text-dark">{{$incidencia->id}}</td>
            <td class="text-dark">{{$incidencia->titulo}}</td>
            <td class="text-dark">{{$incidencia->descripcion}}</td>
            <td class="text-center"><span class="badge outline-badge-primary" style="background-color: white"> {{$incidencia->statu->nombre}} </span></td>
            <td class="text-center">
                <div class="d-flex justify-content-center align-items-center">
                    <a class="bs-tooltip" href="{{route('admin.incidencias.show', $incidencia)}}" title="Mostrar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0960DE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                        <path d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9-4.03-9-9-9zm0 16c-3.86 0-7-3.14-7-7s3.14-7 7-7 7 3.14 7 7-3.14 7-7 7zm0-9c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg></a>
                    <a class="bs-tooltip" href="{{route('admin.incidencias.edit', $incidencia->id)}}" title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#1C10F4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg><span class="icon-name"></span> </a>
                    <form class="delete-form" action="{{route('admin.incidencias.destroy', $incidencia)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bs-tooltip" title="Eliminar" style="background: none; border: none; cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel">
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
@endsection
