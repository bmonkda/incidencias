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