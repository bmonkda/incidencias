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
                    <h1 class="s-counter1 s-counter">{{$incidenciascreadascount}}</h1>
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <span class="badge outline-badge-primary"> {{$estatuscreado->nombre}} </span>
            </button>

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
                                    @foreach($incidenciascreadas as $creada)
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
                    <h1 class="s-counter2 s-counter">{{$incidenciasesperacount}}</h1>
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                <span class="badge badge-warning"> {{$estatusespera->nombre}} </span>
            </button>
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
                                    @foreach($incidenciasespera as $creada)
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
                    <h1 class="s-counter3 s-counter">{{$incidenciasaignadocount}}</h1>
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
                <span class="badge badge-primary"> {{$estatusaignado->nombre}} </span>
            </button>
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
                                    @foreach($incidenciasaignado as $creada)
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
                    <h1 class="s-counter4 s-counter">{{$incidenciascerrarecount}}</h1>
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal3">
                <span class="badge badge-success"> {{$estatuscerrare->nombre}} </span>
            </button>
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
                                    @foreach($incidenciascerrare as $creada)
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
                    <h1 class="s-counter5 s-counter">{{$incidenciascerranocount}}</h1>
                </div>
                <p class="s-counter-text">Estatus:</p>
            </div>
            <button style="background: transparent !important; border: none !important; padding: 0;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal4">
                <span class="badge badge-danger"> {{$estatuscerrano->nombre}} </span>
            </button>
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
                                    @foreach($incidenciascerrano as $creada)
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
        <h4>Listado de incidencias creadas</h4>
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
        </tr>
        </thead>
        <tbody>
        @foreach($incidenciascreadas as $creada)
        <tr class="table-primary">
            <td class="text-dark">{{$creada->id}}</td>
            <td class="text-dark">{{$creada->titulo}}</td>
            <td class="text-dark">{{$creada->descripcion}}</td>
            <td class="text-center"><span class="badge outline-badge-primary" style="background-color: white"> {{$creada->statu->nombre}} </span></td>
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
