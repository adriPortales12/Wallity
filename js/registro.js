document.getElementById("formularioRegistro").addEventListener("submit", function(event) {

    let nombre = document.getElementById("nombre").value;
    let nombre_usuario = document.getElementById("nombre_usuario").value;
    let contrasena = document.getElementById("contrasena").value;
    let contrasena2 = document.getElementById("contrasena2").value;


    // Validar que el nombre no esté vacío y tenga al menos 6 caracteres
    if (nombre.trim() === "") {
        alert("El nombre no puede estar vacío");
        event.preventDefault(); 
        return;
    }

    // Validar que el nombre de usuario no esté vacío y tenga al menos 6 caracteres
    if (nombre_usuario.trim().length < 6) {
        alert("El nombre de usuario debe tener al menos 6 caracteres");
        event.preventDefault(); 
        return;
    }

    // Validar que el nombre no contenga números
    if (/\d/.test(nombre)) {
        alert("El nombre no puede contener números");
        event.preventDefault(); 
        return;
    }
    
    // Validar que la contraseña cumpla con los requisitos
    if (!/[A-Z]/.test(contrasena)) {
        alert("La contraseña debe contener al menos una mayúscula");
        event.preventDefault(); 
        return;
    }

    if (!/\d/.test(contrasena)) {
        alert("La contraseña debe contener al menos un número");
        event.preventDefault(); 
        return;
    }

    if (contrasena.length < 6) {
        alert("La contraseña debe tener al menos 6 caracteres");
        event.preventDefault(); 
        return;
    }

    if (contrasena !== contrasena2) {
        alert("Las contraseñas no coinciden");
        event.preventDefault(); 
    }
});
