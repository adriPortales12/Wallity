document.addEventListener('DOMContentLoaded', function() {


    document.getElementById('logout').addEventListener('click', function(event) {
        let confirmacion = window.confirm('¿Quieres cerrar sesión?');
        if (!confirmacion) {
            event.preventDefault();
        }
    });

    document.getElementById('limite').addEventListener('submit', function(event) {
        event.preventDefault();

        let limite = document.getElementById('limiteInput').value;
        let errores = false;

        if (!esCantidadValida(limite)) {
            alert('No es una cantidad válida');
            errores = true;
        }

        if (errores) {
            return;
        }

        alert('Se ha modificado correctamente el límite');
        this.submit();
    });

    function esCantidadValida(cantidad) {
        let validacion = /^[0-9]+(\.[0-9]{1,2})?$/;
        return validacion.test(cantidad.trim());
    }

});
