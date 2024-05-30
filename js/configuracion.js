document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('logout').addEventListener('click', function (event) {
        event.preventDefault();  // Previene la acción por defecto del botón de logout

        Swal.fire({
            title: '¿Seguro que quieres cerrar sesión?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'No, cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si se confirma, continúa con la acción de logout
                window.location.href = this.href;  // Redirige al href del enlace de logout
            } else {
                // Si se cancela, no hace nada
                // Esto se puede omitir ya que el preventDefault evita la acción por defecto
            }
        });
    });

    document.getElementById('limite').addEventListener('submit', function (event) {
        event.preventDefault();

        let limite = document.getElementById('limiteInput').value;
        let errores = false;

        if (!esCantidadValida(limite)) {
            Swal.fire({
                title: 'Error',
                text: 'Mejor pon un número',
                icon: 'question',
                confirmButtonText: 'Entendido'
            });
            errores = true;
        }

        if (errores) {
            return;
        }

        Swal.fire({
            title: 'Perfecto',
            text: 'Límite actualizado',
            icon: 'success',
            showConfirmButton: false,
            allowOutsideClick: false,
            allowEscapeKey: false,
            timer: 1500,
            timerProgressBar: true
        });

        setTimeout(() => {
            this.submit();
        }, 1500);
    });

    function esCantidadValida(cantidad) {
        let validacion = /^[0-9]+(\.[0-9]{1,2})?$/;
        return validacion.test(cantidad.trim());
    }

    

});
