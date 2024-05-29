document.addEventListener('DOMContentLoaded', function () {
    const openPopupBtn = document.getElementById('openPopupBtn');
    const popupModal = new bootstrap.Modal(document.getElementById('popupModal'));


    // Agrega un evento de clic al botón para abrir el modal
    openPopupBtn.addEventListener('click', function () {
        popupModal.show(); // Muestra el modal cuando se hace clic en el botón
    });

    const deleteButtons = document.querySelectorAll('.borrar-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault();  // Evitar la acción por defecto del formulario para manejarlo manualmente

            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Estás seguro de que deseas borrar este gasto?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, borrar',
                cancelButtonText: 'No, cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mostrar mensaje de éxito
                    Swal.fire({
                        title: '¡Adiós!',
                        text: 'Gasto borrado',
                        icon: 'success',
                        showConfirmButton: false,
                        allowOutsideClick: false,  // No permitir clics fuera del cuadro de diálogo
                        allowEscapeKey: false,     // No permitir cerrar el cuadro de diálogo con la tecla de escape
                        timer: 1500,               // Cerrar automáticamente después de 1.5 segundos
                        timerProgressBar: true
                    });

                    // Esperar 1.5 segundos antes de proceder con la eliminación
                    setTimeout(() => {
                        // Proceder con la eliminación del gasto
                        this.closest('form').submit();
                    }, 1500);
                }
            });
        });
    });


    function esCantidadValida(cantidad) { // valida un número entero o decimal con hasta dos decimales
        let validacion = /^[0-9]+(\.[0-9]{1,2})?$/;
        return validacion.test(cantidad.trim());
    }

    document.getElementById('formularioGasto').addEventListener('submit', function (event) {
        // Evitar el envío del formulario por defecto
        event.preventDefault();

        // Capturar los valores de los campos del formulario
        var titulo = document.getElementById('titulo').value;
        var cantidad = document.getElementById('cantidad').value;

        // Validar los campos del formulario
        var errores = false;

        if (titulo.trim() === '') {
            Swal.fire({
                title: 'Error',
                text: 'Mejor escribe algo en el título',
                icon: 'warning',
                confirmButtonText: 'Vale'
            });
            errores = true;
        }

        if (!esCantidadValida(cantidad)) {
            Swal.fire({
                title: 'Error',
                text: 'Eso no es un número válido',
                icon: 'warning',
                confirmButtonText: 'Vale'
            });
            errores = true;
        }
        // Si hay errores, no enviar el formulario
        if (errores) {
            return;
        }

        // Si no hay errores, enviar el formulario
        Swal.fire({
            title: '¡Muy bien!',
            text: 'Gasto añadido',
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

    document.getElementById('modificarGastoForm').addEventListener('submit', function (event) {
        // Evitar el envío del formulario por defecto
        event.preventDefault();

        // Capturar los valores de los campos del formulario
        let titulo = document.getElementById('modificar-titulo').value;
        let cantidad = document.getElementById('modificar-cantidad').value;

        var errores = false;

        if (titulo.trim() === '') {
            Swal.fire({
                title: 'Error',
                text: 'Mejor escribe algo en el título',
                icon: 'warning',
                confirmButtonText: 'Vale'
            });
            errores = true;
        }

        if (!esCantidadValida(cantidad)) {
            Swal.fire({
                title: 'Error',
                text: 'Eso no es un número válido',
                icon: 'warning',
                confirmButtonText: 'Vale'
            });
            errores = true;
        }
        // Si hay errores, no enviar el formulario
        if (errores) {
            return;
        }

        // Si no hay errores, enviar el formulario
        Swal.fire({
            title: '¡Muy bien!',
            text: 'Gasto modificado',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true
        });

        setTimeout(() => {
            this.submit();
        }, 1500);
    });

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

    // Funcionalidad para el modal de modificación
    const modifyButtons = document.querySelectorAll('.modificar-btn');
    const modificarModal = new bootstrap.Modal(document.getElementById('modificarModal'));

    modifyButtons.forEach(button => {
        button.addEventListener('click', function () {
            const id = this.getAttribute('data-id');
            const titulo = this.getAttribute('data-titulo');
            const categoria = this.getAttribute('data-categoria');
            const cantidad = this.getAttribute('data-cantidad');

            document.getElementById('modificar-id').value = id;
            document.getElementById('modificar-titulo').value = titulo;
            document.getElementById('modificar-categoria').value = categoria;
            document.getElementById('modificar-cantidad').value = cantidad;

            modificarModal.show();
        });
    });
});
