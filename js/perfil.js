document.getElementById('cambioNombre').addEventListener('submit', function(event) {
    // Evitar el envío del formulario por defecto
    event.preventDefault();
    
    // Capturar los valores de los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var nombre_usuario = document.getElementById('nombre_usuario').value;
    
    // Validar los campos del formulario
    var errores = false;
    
    if (nombre.trim() === "") {
        alert("El nombre no puede estar vacío");
        errores=true;
    }
    
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
    // Si hay errores, no enviar el formulario
    if (errores) {
        return;
    }
    
    // Si no hay errores, enviar el formulario
    alert('Cambio de nombre exitoso')
    this.submit();
});

document.getElementById('cambioContrasena').addEventListener('submit', function(event) {
    // Evitar el envío del formulario por defecto
    event.preventDefault();
    
    // Capturar los valores de los campos del formulario
    var contrasena = document.getElementById('contrasena').value;
    var contrasena2 = document.getElementById('contrasena2').value;
    
    // Validar los campos del formulario
    var errores = false;
    
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
        return;
    }
    
    // Si no hay errores, enviar el formulario
    alert('Cambio de contraseña exitoso')
    this.submit();
});

document.getElementById('logout').addEventListener('click', function(event) {
    let confirmacion = window.confirm('¿Quieres cerrar sesión?');
    if(!confirmacion){
        event.preventDefault();
    }
});