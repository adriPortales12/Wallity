document.addEventListener('DOMContentLoaded', function() {

const openPopupBtn = document.getElementById('openPopupBtn');
        const popupModal = new bootstrap.Modal(document.getElementById('popupModal'));

        // Agrega un evento de clic al botón para abrir el modal
        openPopupBtn.addEventListener('click', function() {
            popupModal.show(); // Muestra el modal cuando se hace clic en el botón
        });
        });