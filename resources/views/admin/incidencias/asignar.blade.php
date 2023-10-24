@extends('template.layouts.page')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/datatables-dark.css') }}">
    <link href="{{ asset('template/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/plugins/tagInput/tags-input.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div class="row mt-5">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            <h4>Asignar incidencia: {{ $incidencia->id }}</h4>
        </div>
    </div>

    <form action="{{ route('admin.incidencias.asignarIncidencia', $incidencia) }}" method="POST" autocomplete="off"
        enctype="multipart/form-data">

        @csrf

        {{-- @method('PUT') --}}

        @if (Auth::user()->esAdmin())
            <div class="row">
                {{-- <div class="col-md-3">
                    <div class="form-group">
                        <label>Statu:</label>
                        <select class="form-control @error('statu_id') is-invalid @enderror" name="statu_id" id="statu">
                            <option selected disabled>Selecionar statu</option>
                            @foreach ($status as $statu)
                                <option value="{{ $statu->id }}"
                                    {{ old('statu_id', $incidencia->statu_id ?? '') == $statu->id ? 'selected' : '' }}>
                                    {{ $statu->id }} - {{ $statu->nombre }}</option>
                            @endforeach
                        </select>

                        @error('statu_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div> --}}

                <div class="col-md-9">
                    <div class="form-group">
                        <label>Asignado a:</label>
                        <select class="form-control @error('asignado_id') is-invalid @enderror" name="asignado_id" id="asignado_id">
                            <option selected disabled>Selecione una opción</option>
                            @foreach ($tecnologiaUsers as $idUsuario => $nombre)
                                {{-- <option value="{{ $tecnologiaUser/* ->idusuario */ }}" {{ old('user_id', $incidencia->user_id ?? '') == $tecnologiaUser/* ->idusuario */ ? 'selected' : '' }}>{{ $tecnologiaUser->id }} - {{ $tecnologiaUser/* ->nombre */ }}</option> --}}
                                <option value="{{ $idUsuario /*->idusuario */ }}"
                                    {{ old('asignado_id', $incidencia->asignado_id ?? '') == $idUsuario /*->idusuario */ ? 'selected' : '' }}>
                                    {{ $idUsuario }} - {{ $nombre /*->nombre */ }}</option>
                            @endforeach
                        </select>

                        @error('asignado_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>


        @endif

        <div class="form-group pt-2">
            <a href="{{ route('admin.incidencias.index') }}" class="btn btn-dark" title="Lista de incidencias">Volver</a>
            {{-- <input class="btn btn-primary" type="submit" value="Guardar" title="Guardar incidencia"> --}}
            <button type="submit" class="btn btn-primary" title="Asignar incidencia">Asignar</button>
        </div>

    </form>
@endsection


@section('scripts')
    <script src="{{ asset('template/plugins/counter/jquery.countTo.js') }}"></script>
    <script src="{{ asset('template/assets/js/components/custom-counter.js') }}"></script>

    <script src="{{ asset('template/assets/js/elements/tooltip.js') }}"></script>
    <script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cargar subcategorías dinámicamente cuando cambie la selección de categoría
            document.getElementById('categoria').addEventListener('change', function() {
                const categoria_id = this.value;
                const subcategoriaSelect = document.getElementById('subcategoria');

                // subcategoriaSelect.innerHTML = '<option value="" disabled>Seleccionar Subcategoría</option>';
                subcategoriaSelect.innerHTML =
                    '<option value="" disabled selected>Seleccione una Subcategoría</option>';
                // subcategoriaSelect.innerHTML = '<option selected disabled>Seleccionar Subcategoría</option>';

                if (categoria_id) {
                    fetch(`/subcategorias/${categoria_id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('La respuesta de la red no fue correcta');
                            }
                            return response.json();
                        })
                        .then(data => {
                            data.forEach(subcategoria => {
                                const option = document.createElement('option');
                                option.value = subcategoria.id;
                                option.text = `${subcategoria.id} - ${subcategoria.nombre}`;
                                subcategoriaSelect.appendChild(option);
                            });

                            // Verificar si hay una subcategoría seleccionada previamente
                            @php
                                $subcategoria_id = old('subcategoria_id') ?? ($incidencia->subcategoria_id ?? null);
                            @endphp

                            if (@json($subcategoria_id)) {
                                subcategoriaSelect.value = @json($subcategoria_id);
                            }
                        })
                        .catch(error => {
                            console.error('Error al cargar subcategorías:', error);
                        });
                }
            });

            // Al cargar la página, simular un cambio en la categoría para obtener las subcategorías relacionadas (si es necesario)
            document.getElementById('categoria').dispatchEvent(new Event('change'));
        });
    </script>

    <script src="{{ asset('template/assets/js/incidencias/stringToSlug.js') }}"></script>
@endsection
