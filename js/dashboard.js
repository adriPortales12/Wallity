document.addEventListener('DOMContentLoaded', function() {

const openPopupBtn = document.getElementById('openPopupBtn');
        const popupModal = new bootstrap.Modal(document.getElementById('popupModal'));

        // Agrega un evento de clic al botón para abrir el modal
        openPopupBtn.addEventListener('click', function() {
            popupModal.show(); // Muestra el modal cuando se hace clic en el botón
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
        alert('Escribe un título')
        errores = true;
    }
    
    else if (cantidad.trim() === '' || isNaN(parseFloat(cantidad))) {
        alert('No es una cantidad válida')
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