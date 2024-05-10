// si no se ha encontrado un usuario en el controlador de login, vuelve con un error en el get, este lo busca y manda el mensaje de error
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('error') && urlParams.get('error') === '1') {
    alert('el usuario no se ha encontrado');
    // Obtener la URL actual sin el parámetro GET
    let urlSinGET = window.location.origin + window.location.pathname;

    // Reemplazar la URL en el historial del navegador sin el parámetro GET para que al recargar no siga saliendo el error
    history.replaceState(null, null, urlSinGET);
}

document.getElementById("formularioLogin").addEventListener("submit", function(event) {

    let nombre = document.getElementById("usuario").value;
    let contrasena = document.getElementById("contrasena").value;


    if (nombre.trim() === "") {
        alert("El nombre no puede estar vacío");
        event.preventDefault(); 
        return;
    }

    if (contrasena.trim() === "") {
        alert("La contraseña no puede estar vacía");
        event.preventDefault(); 
        return;
    }
});
