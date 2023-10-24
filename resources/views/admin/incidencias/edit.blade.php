@extends('template.layouts.page')

{{-- @section('styles')
    <link href="{{asset('template/assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('template/assets/css/components/custom-counter.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('template/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('template/assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('template/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css" />
@endsection --}}


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/plugins/table/datatable/datatables-dark.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('template/plugins/table/datatable/dt-global_style-dark.css')}}"> --}}
    <link href="{{ asset('template/assets/css/elements/tooltip.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/plugins/tagInput/tags-input.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <div class="row mt-5">
        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
            <h4>Editar incidencia: {{ $incidencia->id }}</h4>
        </div>
    </div>

    <form action="{{ route('admin.incidencias.update', $incidencia->id) }}" method="POST" autocomplete="off"
        enctype="multipart/form-data">

        @csrf

        @method('PUT')

        {{-- @include('incidencias.partials.form') --}}
        @include('admin.incidencias.partials.form', ['incidencia' => $incidencia])

        {{-- <label for="archivo">Archivos relacionados:</label>
        <ul>
            @foreach ($archivos as $archivo)
                <li>
                    {{ $archivo->descripcion }}
                    <label name="nuevos_archivos[{{ $archivo->id }}]">
                    <input type="checkbox" name="eliminar_archivos[{{ $archivo->id }}]" value="1"> Eliminar
                </li>
            @endforeach
        </ul> --}}

        <div class="form-group pt-2">
            <a href="{{ route('admin.incidencias.index') }}" class="btn btn-dark" title="Lista de incidencias">Volver</a>
            {{-- <input class="btn btn-primary" type="submit" value="Guardar" title="Guardar incidencia"> --}}
            <button type="submit" class="btn btn-primary" title="Guardar incidencia">Actualizar</button>
        </div>

    </form>
@endsection


@section('scripts')
    <script src="{{ asset('template/plugins/counter/jquery.countTo.js') }}"></script>
    <script src="{{ asset('template/assets/js/components/custom-counter.js') }}"></script>

    <script src="{{ asset('template/assets/js/elements/tooltip.js') }}"></script>
    <script src="{{ asset('template/plugins/table/datatable/datatables.js') }}"></script>

    {{-- <script>
        document.getElementById('categoriaSelect').addEventListener('change', function() {
            var categoriaId = this.value;
            var subcategoriaSelect = document.getElementById('subcategoriaSelect');
            
            // Limpiar select de subcategorías
            while (subcategoriaSelect.options.length > 0) {
                subcategoriaSelect.remove(0);
            }
            
            if (categoriaId !== '') {
                fetch('/api/subcategorias/' + categoriaId)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(function(subcategoria) {
                            var option = document.createElement('option');
                            option.value = subcategoria.id;
                            option.text = subcategoria.id + " - " + subcategoria.nombre;
                            subcategoriaSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    </script> --}}

    {{-- <script>
        const categoriaSelect = document.getElementById('categoria');
        const subcategoriaSelect = document.getElementById('subcategoria');
    
        categoriaSelect.addEventListener('change', () => {
            const categoriaId = categoriaSelect.value;
    
            // Si no se ha seleccionado una categoría, deshabilitamos el select de subcategorías
            if (categoriaId === '') {
                subcategoriaSelect.innerHTML = '<option value="">Seleccione una subcategoría</option>';
                subcategoriaSelect.disabled = true;
                return;
            }
    
            // Si se seleccionó una categoría, habilitamos el select de subcategorías y hacemos una petición Fetch para obtener las subcategorías
            subcategoriaSelect.disabled = false;
            fetch(`/api/categorias/${categoriaId}/subcategorias`)
                .then(response => response.json())
                .then(data => {
                    // subcategoriaSelect.innerHTML = '<option value="">Seleccione una subcategoría</option>';
                    subcategoriaSelect.innerHTML = '<option selected disabled>Selecionar subCategoria</option>';
                    data.forEach(subcategoria => {
                        const option = document.createElement('option');
                        option.value = subcategoria.id;
                        option.textContent = subcategoria.id + " - " + subcategoria.nombre;
                        subcategoriaSelect.appendChild(option);
                    });
                })
                .catch(error => console.error(error));
        });
    </script> --}}

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
