@extends('template.layouts.page')

@section('styles')

@endsection

@section('content')
    @include('template.layouts.addons.errores')
    <form method="POST" action="{{route('admin.emergencias.update', $emergencia)}}">
        @method('PUT')
        @csrf
        <h4>Edicion de emergencias</h4>
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon5">Nombre</span>
            </div>
            <input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" aria-label="Username"value="{{old('nombre', $emergencia->nombre ?? '')}}">
        </div>
        <div class="input-group mb-4">
            <div class="input-group-prepend">
                <span class="input-group-text">Primer y segundo color</span>
            </div>
            <input type="text" class="form-control" id="color1" name="color1" placeholder="Color" value="{{old('color1', $emergencia->color ?? '')}}">
            <input type="color" class="form-control" id="color2" name="color2" placeholder="" value="{{old('color2', $emergencia->color2 ?? '')}}">
        </div>

        <div class="form-group pt-2">
            <a href="{{route('admin.emergencias.index')}}" class="btn btn-dark">Volver</a>
            <input class="btn btn-primary" type="submit" value="Guardar">
        </div>
    </form>
@endsection

@section('scripts')

@endsection
