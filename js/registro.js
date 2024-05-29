document.getElementById("formularioRegistro").addEventListener("submit", function (event) {

    let nombre = document.getElementById("nombre").value;
    let nombre_usuario = document.getElementById("nombre_usuario").value;
    let contrasena = document.getElementById("contrasena").value;
    let contrasena2 = document.getElementById("contrasena2").value;


    // Validar que el nombre no esté vacío y tenga al menos 6 caracteres
    if (nombre.trim() === "") {
        Swal.fire({
            title: 'Error',
            text: 'Falta el nombre!',
            icon: 'error',
            confirmButtonText: 'Vale'
        });
        event.preventDefault();
        return;
    }

    // Validar que el nombre no contenga números
    if (/\d/.test(nombre)) {
        Swal.fire({
            title: 'Error',
            text: 'Tu nombre no puede tener números',
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
        event.preventDefault();
        return;
    }

    // Validar que el nombre de usuario no esté vacío y tenga al menos 6 caracteres
    if (nombre_usuario.trim().length < 6) {
        Swal.fire({
            title: 'Error',
            text: 'El nombre de usuario debe tener al menos 6 caracteres',
            icon: 'error',
            confirmButtonText: 'Okey'
        });
        event.preventDefault();
        return;
    }

    if (contrasena.trim() === "") {
        Swal.fire({
            title: 'Error',
            text: 'Falta una contraseña!',
            icon: 'error',
            confirmButtonText: 'Vale'
        });
        event.preventDefault();
        return;
    }

    // Validar que la contraseña cumpla con los requisitos
    if (!/[A-Z]/.test(contrasena)) {
        Swal.fire({
            title: 'Error',
            text: 'La contraseña necesita alguna mayúscula',
            icon: 'error',
            confirmButtonText: 'Okey'
        });
        event.preventDefault();
        return;
    }

    if (!/\d/.test(contrasena)) {
        Swal.fire({
            title: 'Error',
            text: 'La contraseña necesita algun número',
            icon: 'error',
            confirmButtonText: 'Vale'
        });
        event.preventDefault();
        return;
    }

    if (contrasena.length < 6) {
        Swal.fire({
            title: 'Error',
            text: 'La contraseña es demasiado corta',
            icon: 'error',
            confirmButtonText: 'Vale'
        });
        event.preventDefault();
        return;
    }

    if (contrasena !== contrasena2) {
        Swal.fire({
            title: 'Error',
            text: 'Las contraseñas no coinciden',
            icon: 'error',
            confirmButtonText: 'Entendido'
        });
        event.preventDefault();
    }
});
