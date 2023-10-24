<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="titulo">Título*:</label>
            <input type="text" name="titulo" id="titulo" class="form-control @error('titulo') is-invalid @enderror"
                placeholder="Ingrese el título de la incidencia" value="{{ old('titulo', $incidencia->titulo ?? '') }}">

            @error('titulo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                placeholder="Slug de la incidencia" readonly value="{{ old('slug', $incidencia->slug ?? '') }}">

            @error('slug')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="descripcion">Descripción*:</label>
    <textarea name="descripcion" id="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
        placeholder="Ingrese la descripción de la incidencia">{{ old('descripcion', $incidencia->descripcion ?? '') }}</textarea>

    @error('descripcion')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="row">

    <div class="col-md-4">
        <div class="form-group">
            <label for="categoria">Categoría*</label>
            <select class="form-control @error('categoria_id') is-invalid @enderror" name="categoria_id" id="categoria">
                <option selected disabled>Seleccionar Categoría</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id', $incidencia->categoria_id ?? '') ==
                    $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->id }} - {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>

            @error('categoria_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label for="subcategoria">Subcategoría*</label>
            <select class="form-control @error('subcategoria_id') is-invalid @enderror" name="subcategoria_id"
                id="subcategoria">
                {{-- <option selected disabled>Seleccionar Subcategoría</option> --}}
                {{-- <option value="" @if (old('subcategoria_id')===null && !isset($incidencia->subcategoria_id))
                    selected @endif disabled>Seleccionar Subcategoría</option> --}}
            </select>

            @error('subcategoria_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label for="emergencia">Urgencia*</label>
            <select class="form-control @error('emergencia_id') is-invalid @enderror" name="emergencia_id"
                id="emergencia">
                <option selected disabled>Selecionar Urgencia</option>
                @foreach ($emergencias as $emergencia)
                <option value="{{ $emergencia->id }}" {{ old('emergencia_id', $incidencia->emergencia_id ?? '') ==
                    $emergencia->id ? 'selected' : '' }}>{{ $emergencia->id }} - {{ $emergencia->nombre }}</option>
                @endforeach
            </select>

            @error('emergencia_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-9">
        <div class="form-group">
            <label for="archivo">Adjuntar Archivos:</label>
            {{-- <input type="file" name="nuevo_archivo" id="nuevo_archivo" class="form-control"> --}}
            {{-- <input type="file" name="archivo" id="archivo" multiple --}}
            <input type="file" name="nuevos_archivos[]" id="nuevo_archivo" multiple
                class="form-control @error('archivo') is-invalid @enderror">

            @error('archivo')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

    <div class="col-md-3">
        
    </div>

</div>






{{-- <select class="custom-select" name="modelo_planta" aria-label="">
    <option value="" @if (old('modelo_planta')===null && !isset($acueducto->modelo_planta)) selected @endif
        disabled>Seleccionar Modelo de
        planta</option>
    @foreach ($modelosplanta as $modeloplanta)
    <option value="{{ $modeloplanta->id }}" {{ (old('modelo_planta') && old('modelo_planta')==$modeloplanta->id) ||
        (isset($acueducto->modelo_planta) && $acueducto->modelo_planta == $modeloplanta->id) ? 'selected' : '' }}>
        {{ $modeloplanta->concepto }}
    </option>
    @endforeach
</select> --}}






