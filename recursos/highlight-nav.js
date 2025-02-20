function getCurrentPageName() {
    var pathArray = window.location.pathname.split('/');
    var currentPage = pathArray[pathArray.length - 1];
    return currentPage;
}

// highlight-nav.js

document.addEventListener("DOMContentLoaded", function () {
    // Obtén todos los enlaces de navegación
    var enlaces = document.querySelectorAll('.nav-link');

    // Obtiene el nombre de la página actual
    var currentPage = getCurrentPageName();

    // Agrega un controlador de eventos a cada enlace
    enlaces.forEach(function (enlace) {
        // Obtiene el nombre de la página vinculada
        var linkedPage = enlace.getAttribute('href').split('/').pop();

        // Agrega la clase "active" si es la página actual
        if (linkedPage === currentPage) {
            enlace.classList.add('active');
        }

        enlace.addEventListener('click', function (event) {
            // Previene la acción predeterminada del enlace (navegación)
            event.preventDefault();

            // Elimina la clase "active" de todos los enlaces
            enlaces.forEach(function (e) {
                e.classList.remove('active');
            });

            // Agrega la clase "active" al enlace clicado
            this.classList.add('active');

            // Obtiene la URL del enlace clicado
            var urlDestino = this.getAttribute('href');

            // Navega a la URL después de un breve retraso
            setTimeout(function () {
                window.location.href = urlDestino;
            }, 300); // Puedes ajustar el tiempo de retraso según sea necesario
        });
    });

    // Función para obtener el nombre de la página actual
    function getCurrentPageName() {
        var pathArray = window.location.pathname.split('/');
        var currentPage = pathArray[pathArray.length - 1];
        return currentPage;
    }
});
