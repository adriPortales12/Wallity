document.addEventListener('DOMContentLoaded', function() {
    const openPopupBtn = document.getElementById('openPopupBtn');
    const popupModal = new bootstrap.Modal(document.getElementById('popupModal'));

    // Agrega un evento de clic al botón para abrir el modal
    openPopupBtn.addEventListener('click', function() {
        popupModal.show(); // Muestra el modal cuando se hace clic en el botón
    });

    const deleteButtons = document.querySelectorAll('.borrar-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const confirmDelete = confirm('¿Estás seguro de que deseas borrar este gasto?');
            if (!confirmDelete) {
                event.preventDefault();
            }
        });
    });

    document.getElementById('formularioGasto').addEventListener('submit', function(event) {
        // Evitar el envío del formulario por defecto
        event.preventDefault();
        
        // Capturar los valores de los campos del formulario
        var titulo = document.getElementById('titulo').value;
        var cantidad = document.getElementById('cantidad').value;
        
        // Validar los campos del formulario
        var errores = false;
        
        if (titulo.trim() === '') {
            alert('Escribe un título');
            errores = true;
        }
        
        else if (cantidad.trim() === '' || isNaN(parseFloat(cantidad))) {
            alert('No es una cantidad válida');
            errores = true;
        }
        // Si hay errores, no enviar el formulario
        if (errores) {
            return;
        }
        
        // Si no hay errores, enviar el formulario
        this.submit();
    });

    document.getElementById('logout').addEventListener('click', function(event) {
        let confirmacion = window.confirm('¿Quieres cerrar sesión?');
        if(!confirmacion){
            event.preventDefault();
        }
    });

    // Funcionalidad para el modal de modificación
    const modifyButtons = document.querySelectorAll('.modificar-btn');
    const modificarModal = new bootstrap.Modal(document.getElementById('modificarModal'));

    modifyButtons.forEach(button => {
        button.addEventListener('click', function() {
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
