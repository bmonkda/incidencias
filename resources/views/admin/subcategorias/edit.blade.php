@extends('template.layouts.page')

@section('styles')

@endsection

@section('content')
    @include('template.layouts.addons.errores')
    <form method="POST" action="{{route('admin.subcategorias.update', $subcategoria)}}">
        @csrf
        @method('PUT')
        <h4>Edicion de Subcategoria</h4>
        <div class="form-group">
            <label for="id_categoria">Categoria</label>
            <select class="custom-select" name="id_categoria" aria-label="">
                @foreach($categorias as $categoria)
                    <option value="{{$categoria->id}}" {{ old('id_categoria', $subcategoria->categoria_id) == $categoria->id ? 'selected' : '' }}>{{$categoria->nombre}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre de la categoria" value="{{old('nombre', $subcategoria->nombre ?? '')}}">
        </div>

        <div class="form-group pt-2">
            <a href="{{route('admin.subcategorias.index')}}" class="btn btn-dark">Volver</a>
            <input class="btn btn-primary" type="submit" value="Guardar">
        </div>
    </form>
@endsection

@section('scripts')

@endsection
