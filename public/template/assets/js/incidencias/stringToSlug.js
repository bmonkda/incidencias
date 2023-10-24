document.addEventListener('DOMContentLoaded', function() {
    var tituloInput = document.getElementById('titulo');
    var slugInput = document.getElementById('slug');
    
    tituloInput.addEventListener('keyup', updateSlug);
    tituloInput.addEventListener('keydown', updateSlug);
    tituloInput.addEventListener('blur', updateSlug);
    
    function updateSlug() {
        var titulo = tituloInput.value;
        var slug = stringToSlug(titulo, '-');
        slugInput.value = slug;
    }

    function stringToSlug(text, separator) {
        var slug = text
            .normalize("NFD")
            .replace(/[\u0300-\u036f]/g, "") // Elimina las diacríticas
            .toLowerCase()
            .replace(/[^a-z0-9]+/g, separator)
            .replace(new RegExp('^' + separator + '+|' + separator + '+$', 'g'), '');
        
        return slug;
    }
    

});