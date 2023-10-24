<div class="detalle">
    <div class="detalle-item">
        <strong class="detalle-titulo">TÍTULO:</strong>
        <span class="detalle-descripcion">{{ $incidencia->titulo }}</span>
    </div>
    <div class="detalle-item">
        <strong class="detalle-titulo">DESCRIPCIÓN:</strong>
        <span class="detalle-descripcion">{{ $incidencia->descripcion }}</span>
    </div>
    <div class="detalle-item">
        <strong class="detalle-titulo">CATEGORÍA:</strong>
        <span class="detalle-descripcion">{{ $incidencia->categoria->nombre }}</span>
    </div>
    <div class="detalle-item">
        <strong class="detalle-titulo">SUBCATEGORÍA:</strong>
        <span class="detalle-descripcion">{{ $incidencia->subcategoria->nombre }}</span>
    </div>
    <div class="detalle-item">
        <strong class="detalle-titulo">PRIORIDAD:</strong>
        <span class="detalle-descripcion">{{ $incidencia->emergencia->nombre }}</span>
    </div>
    <div class="detalle-item">
        <strong class="detalle-titulo">STATUS:</strong>
        <span class="detalle-descripcion">
            <span class="badge outline-badge-dark"
                style="background-color: {{ $incidencia->statu->color2 }}">{{ $incidencia->statu->nombre }}</span>
        </span>
    </div>
    <div class="detalle-item">
        <strong class="detalle-titulo">ASIGNADA A:</strong>
        <span class="detalle-descripcion">{{ $incidencia->asignadoA ? $incidencia->asignadoA->nombre : 'Sin asignar' }}</span>
    </div>
    

    <div class="detalle-item">
        <strong class="detalle-titulo">OBSERVACIONES:</strong>
        <span class="detalle-descripcion">{{ $incidencia->observacion }}</span>
    </div>

    <div class="detalle-item">
        <strong class="detalle-titulo">OBSERVACIONES (SOLO ADMINISTRADOR):</strong>
        <span class="detalle-descripcion">{{ $incidencia->observacion2 }}</span>
    </div>


    <div class="detalle-item">
        <strong class="detalle-titulo">Archivos relacionados:</strong>
        <span class="detalle-descripcion">
            @forelse ($incidencia->archivos as $archivo)
                <p><a href="{{ asset('storage/' . $archivo->ruta) }}" target="_blank">{{ $archivo->descripcion }}</a></p>
            @empty
                <p>No hay archivos relacionados.</p>
            @endforelse
        </span>
    </div>
</div>
