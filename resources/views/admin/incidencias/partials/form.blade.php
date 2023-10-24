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
                {{-- <option value="">Seleccione una categoría</option> --}}
                <option selected disabled>Selecionar Categoria</option>
                {{-- @foreach ($subcategorias->unique('categoria_id') as $subcategoria) --}}
                {{-- <option value="{{ $subcategoria->categoria->id }}" {{ old('categoria_id', $post->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}> --}}
                {{-- <option value="{{ $subcategoria->categoria->id }}" {{ old('categoria_id', isset($incidencia) && $incidencia->categoria_id == $subcategoria->categoria->id ? 'selected' : '') }}> --}}
                {{-- <option value="{{ $subcategoria->categoria->id }}" {{ old('categoria_id', $incidencia->categoria_id ?? '') == $subcategoria->categoria->id ? 'selected' : '' }}>
                {{ $subcategoria->categoria->id }} - {{ $subcategoria->categoria->nombre }}
            </option> --}}
                {{-- @endforeach --}}
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ old('categoria_id', $incidencia->categoria_id ?? '') == $categoria->id ? 'selected' : '' }}>
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
                id="subcategoria" {{ $incidencia->categoria_id ? '' : 'disabled' }}>
                {{-- <option value="">Debe seleccionar una Categoría</option> --}}
                {{-- <option selected disabled>Selecionar SubCategoria</option> --}}
                {{-- @foreach ($subcategorias as $subcategoria)
            <option value="{{ $subcategoria->id }}" {{ old('subcategoria', $incidencia->subcategoria_id) == $subcategoria->id ? 'selected' : '' }}>
                {{ $subcategoria->id }} - {{ $subcategoria->nombre }}
            </option>
        @endforeach --}}
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
                    <option value="{{ $emergencia->id }}"
                        {{ old('emergencia_id', $incidencia->emergencia_id ?? '') == $emergencia->id ? 'selected' : '' }}>
                        {{ $emergencia->id }} - {{ $emergencia->nombre }}</option>
                @endforeach
            </select>

            @error('emergencia_id')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label for="archivo">Adjuntar Archivos:</label>
            <input type="file" name="nuevos_archivos[]" id="nuevo_archivo" multiple
                class="form-control @error('archivo') is-invalid @enderror">

            @error('archivo')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>

</div>

<label for="archivo">Archivos relacionados:</label>
        <ul>
            @foreach ($archivos as $archivo)
                <li>
                    {{ $archivo->descripcion }}
                    {{-- <input type="file" name="nuevos_archivos[{{ $archivo->id }}]"> --}}
                    <label name="nuevos_archivos[{{ $archivo->id }}]">
                    <input type="checkbox" name="eliminar_archivos[{{ $archivo->id }}]" value="1"> Eliminar
                </li>
            @endforeach
        </ul>
    

    @if (Auth::user()->esAdmin())
        <div class="row">
            <div class="col-md-3">
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
            </div>

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

        <div class="form-group">
            <label for="observacion">Observaciones:</label>
            <textarea name="observacion" id="observacion" class="form-control @error('observacion') is-invalid @enderror"
                placeholder="Ingrese la descripción de la incidencia">{{ old('observacion', $incidencia->observacion ?? '') }}</textarea>
        
            @error('observacion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="observacion2">Observaciones:</label>
            <textarea name="observacion2" id="observacion2" class="form-control @error('observacion2') is-invalid @enderror"
                placeholder="Ingrese la descripción de la incidencia">{{ old('observacion2', $incidencia->observacion2 ?? '') }}</textarea>
        
            @error('observacion2')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


    @endif
</div>
