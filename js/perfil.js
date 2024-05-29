document.getElementById('cambioNombre').addEventListener('submit', function (event) {
    // Evitar el envío del formulario por defecto
    event.preventDefault();

    // Capturar los valores de los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var nombre_usuario = document.getElementById('nombre_usuario').value;

    // Validar los campos del formulario
    var errores = false;

    if (nombre.trim() === "") {
        Swal.fire({
            title: 'Error',
            text: '¿Por que no tienes nombre?',
            icon: 'warning',
            confirmButtonText: 'Si, tengo'
        });
        errores = true;
    }

    if (nombre_usuario.trim().length < 6) {
        Swal.fire({
            title: 'Error',
            text: 'El nombre de usuario deberia ser más largo',
            icon: 'warning',
            confirmButtonText: 'Entendido'
        });
        event.preventDefault();
        return;
    }

    // Validar que el nombre no contenga números
    if (/\d/.test(nombre)) {
        Swal.fire({
            title: 'Error',
            text: 'No puedes tener un nombre con números',
            icon: 'warning',
            confirmButtonText: 'Es verdad'
        });
        event.preventDefault();
        return;
    }
    // Si hay errores, no enviar el formulario
    if (errores) {
        return;
    }

    // Si no hay errores, enviar el formulario
    Swal.fire({
        title: '¡Perfecto!',
        text: 'Cambios realizados',
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

document.getElementById('cambioContrasena').addEventListener('submit', function (event) {
    // Evitar el envío del formulario por defecto
    event.preventDefault();

    // Capturar los valores de los campos del formulario
    var contrasena = document.getElementById('contrasena').value;
    var contrasena2 = document.getElementById('contrasena2').value;


    if (!/[A-Z]/.test(contrasena)) {
        Swal.fire({
            title: 'Error',
            text: 'Le falta una mayúscula a la contraseña',
            icon: 'warning',
            confirmButtonText: 'Entendido'
        });
        event.preventDefault();
        return;
    }

    if (!/\d/.test(contrasena)) {
        Swal.fire({
            title: 'Error',
            text: 'Le falta algún número a la contraseña',
            icon: 'warning',
            confirmButtonText: 'Vale'
        });
        event.preventDefault();
        return;
    }

    if (contrasena.length < 6) {
        Swal.fire({
            title: 'Error',
            text: 'Pon una contraseña mas larga',
            icon: 'warning',
            confirmButtonText: 'Entendido'
        });
        event.preventDefault();
        return;
    }

    if (contrasena !== contrasena2) {
        Swal.fire({
            title: 'Error',
            text: 'Las contraseñas no son iguales',
            icon: 'warning',
            confirmButtonText: 'Vaya'
        });
        event.preventDefault();
        return;
    }

    Swal.fire({
        title: '¡Perfecto!',
        text: 'Contraseña guardada, no la olvides',
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