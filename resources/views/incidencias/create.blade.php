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
            <h4>Creación de incidencia</h4>
        </div>
    </div>

    <form action="{{ route('incidencias.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">

        @csrf

        {{-- @include('incidencias.partials.form') --}}
        @include('incidencias.partials.form', ['incidencia' => app(App\Models\Incidencia::class)])

        <div class="form-group pt-2">
            <a href="{{ route('incidencias.index') }}" class="btn btn-dark" title="Lista de incidencias">Volver</a>
            {{-- <input class="btn btn-primary" type="submit" value="Guardar" title="Guardar incidencia"> --}}
            <button type="submit" class="btn btn-primary" title="Guardar incidencia">Guardar</button>
        </div>

    </form>


    @if (session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: 'success',
            });
        </script>
    @endif
    
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



    {{-- <script>
        // Cargar subcategorías dinámicamente cuando cambie la selección de categoría
        $('#categoria').on('change', function() {
            const categoria_id = $(this).val();
            $('#subcategoria').empty();
            $('#subcategoria').append('<option selected disabled>Seleccionar Subcategoría</option>');
    
            if (categoria_id) {
                fetch(`/subcategorias/${categoria_id}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategoria => {
                            $('#subcategoria').append(`<option value="${subcategoria.id}">${subcategoria.id} - ${subcategoria.nombre}</option>`);
                        });
                    })
                    .catch(error => {
                        console.error('Error al cargar subcategorías:', error);
                    });
            }
        });
    </script> --}}



    <!-- resources/views/incidencias/edit.blade.php -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Cargar subcategorías dinámicamente cuando cambie la selección de categoría
            document.getElementById('categoria').addEventListener('change', function() {
                const categoria_id = this.value;
                const subcategoriaSelect = document.getElementById('subcategoria');
                subcategoriaSelect.innerHTML =
                '<option selected disabled>Seleccionar Subcategoría</option>';

                if (categoria_id) {
                    fetch(`/subcategorias/${categoria_id}`)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
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




    {{-- <script>
        const categoriaSelect = document.getElementById('categoria');
        const subcategoriaSelect = document.getElementById('subcategoria');
        const subcategoriaSeleccionada = '{{ old("subcategoria") }}';
    
        // Verificar si hay un valor seleccionado en el campo de categoría al cargar la página
        if (categoriaSelect.value !== '') {
            cargarSubcategorias();
        }
    
        categoriaSelect.addEventListener('change', () => {
            cargarSubcategorias();
        });
    
        function cargarSubcategorias() {
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
                    subcategoriaSelect.innerHTML = '<option selected disabled>Selecionar subCategoria</option>';
                    data.forEach(subcategoria => {
                        const option = document.createElement('option');
                        option.value = subcategoria.id;
                        option.textContent = subcategoria.id + " - " + subcategoria.nombre;
    
                        // Verificar si el valor de la subcategoría coincide con el valor 'old' de Laravel
                        if (subcategoria.id == subcategoriaSeleccionada) {
                            option.selected = true; // Seleccionar la opción
                        }
    
                        subcategoriaSelect.appendChild(option);
                    });
                })
                .catch(error => console.error(error));
        }
    </script> --}}


    <script src="{{ asset('template/assets/js/incidencias/stringToSlug.js') }}"></script>
@endsection
