@extends('template.layouts.page')

@section('styles')

@endsection

@section('content')
    @include('template.layouts.addons.errores')
    <form method="POST" action="{{route('admin.categorias.update', $categoria)}}">
        @method('PUT')
        @csrf
        <h4>Creacion de categoria</h4>
        <div class="form-group mb-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre de la categoria" value="{{old('nombre', $categoria->nombre ?? '')}}">
        </div>
        <div class="form-group mb-4">
            <label for="ruta">Ruta</label>
            <input type="text" class="form-control" id="ruta" name="ruta" placeholder="" value="{{old('ruta', $categoria->slug ?? '')}}">
        </div>
        <div class="form-group pt-2">
            <a href="{{route('admin.categorias.index')}}" class="btn btn-dark">Volver</a>
            <input class="btn btn-primary" type="submit" value="Guardar">
        </div>
    </form>
@endsection

@section('scripts')
    <script>
        const nombreInput = document.getElementById("nombre");
        const rutaInput = document.getElementById("ruta");

        nombreInput.addEventListener("keyup", function(event) {
            const nombre = event.target.value.toLowerCase().replace(/ /g, "-");
            rutaInput.value = nombre;
        });
    </script>
@endsection
