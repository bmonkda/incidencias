<div class="table-responsive">
    <table id="detalle" class="table table-bordered mb-4 contextual-table">
    
        <thead>
            <tr class="table-dark">
                {{-- <th class="text-center text-dark">ID</th> --}}
                <th class="text-center text-dark">TÍTULO</th>
                <th class="text-center text-dark">DESCRIPCIÓN</th>
                <th class="text-center text-dark">CATEGORÍA</th>
                {{-- <th class="text-center text-dark">SUBCATEGORÍA</th> --}}
            </tr>
        </thead>

        <tbody>
            <tr class="table-primary">
                {{-- <td class="text-center text-dark">{{ $incidencia->id }}</td> --}}
                <td class="{{-- text-center text --}}-dark">{{ $incidencia->titulo }}</td>
                <td class="{{-- text-center --}} text-dark">{{ $incidencia->descripcion }}</td>
                <td class="text-center text-dark">{{ $incidencia->categoria->nombre }} </td>
                {{-- <td class="text-center text-dark">{{ $incidencia->subcategoria->nombre }}</td> --}}
            </tr>
        </tbody>

        <thead>
            <tr class="table-dark">
                <th class="text-center text-dark">SUBCATEGORÍA</th>
                <th class="text-center text-dark">PRIORIDAD</th>
                <th class="text-center text-dark">STATUS</th>
                {{-- <th class="text-center text-dark">ASIGNADO A</th> --}}
                {{-- <th class="text-center text-dark">CREADO</th> --}}
                {{-- <th class="text-center text-dark">ACTUALIZADO</th> --}}
            </tr>
        </thead>

        <tbody>
            <tr class="table-primary">
                <td class="text-center text-dark">{{ $incidencia->subcategoria->nombre }}</td>
                <td class="text-center text-dark">{{ $incidencia->emergencia->nombre }}</td>
                <td class="text-center"><span class="badge outline-badge-dark{{-- primary --}}" style="background-color: {{$incidencia->statu->color2}}"> {{$incidencia->statu->nombre}} </span></td>
                {{-- <td class="text-center text-dark">{{ $incidencia->asignado_id != null ? $incidencia->asignado->nombre : 'Sin asignar' }} </td> --}}
                {{-- <td class="text-center text-dark">{{ $incidencia->created_at }}</td> --}}
                {{-- <td class="text-center text-dark">{{ $incidencia->updated_at }}</td> --}}
            </tr>
        </tbody>
        
    </table>
</div>