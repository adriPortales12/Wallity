$(document).ready(function() {
    // Evento click para abrir el popup de edición al hacer clic en el botón "Editar"
    $('#editarGasto').click(function() {
        // Obtener el ID del gasto desde el atributo data-id del botón
        var gastoID = $(this).data('id');

        // Realizar la solicitud AJAX para cargar el contenido del popup de edición
        $.ajax({
            url: '/VirtualWalletSpending/controladores/controladorEditarGasto.php', // URL del script PHP que devuelve el contenido del popup de edición
            method: 'GET',
            data: { id: gastoID }, // Enviar el ID del gasto como parámetro
            success: function(response) {
                // Insertar el contenido del popup en el cuerpo del modal
                $('#popupEditar .modal-body').html(response);

                // Mostrar el modal
                $('#popupEditar').modal('show');
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar el contenido del popup de edición:', error);
            }
        });
    });

    // Evento submit para el formulario de edición de gasto
    $('#formEditarGasto').submit(function(event) {
        event.preventDefault(); // Evitar el envío del formulario por defecto

        // Obtener los datos del formulario
        var formData = $(this).serialize();

        // Realizar la solicitud AJAX para guardar los cambios del gasto
        $.ajax({
            url: 'guardar_cambios_gasto.php', // URL del script PHP para guardar los cambios del gasto
            method: 'POST',
            data: formData,
            success: function(response) {
                // Cerrar el modal de edición
                $('#popupEditar').modal('hide');

                // Recargar la página para actualizar la lista de gastos
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error('Error al guardar los cambios del gasto:', error);
            }
        });
    });
});
