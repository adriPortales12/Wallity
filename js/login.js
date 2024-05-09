document.getElementById("formularioRegistro").addEventListener("submit", function(event) {

    let usuario = document.getElementById('usuario');

    if (usuario.trim() === "") {
        alert("El usuario no puede estar vacío");
        event.preventDefault(); 
        return;
    }
});