document.getElementById("formularioRegistro").addEventListener("submit", function(event) {

    let nombre = document.getElementById("nombre").value;
    let nombre_usuario = document.getElementById("nombre_usuario").value;
    let contraseña = document.getElementById("contraseña").value;
    let contraseña2 = document.getElementById("contraseña2").value;

    if (contraseña !== contraseña2) {
        alert("Las contraseñas no coinciden");
        event.preventDefault(); 
    }
});