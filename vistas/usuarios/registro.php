<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas\estilos\estilosLogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="login-container">
        <h2>Registro</h2>
        <form id="formularioRegistro" class="login-form" action="<?php echo BASE_URL; ?>datosRegistro" method="post">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre">
            <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario">
            <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña">
            <input type="password" id="contrasena2" name="contrasena2" placeholder="Repetir contraseña">
            <button type="submit" id="botonRegistro" class="btn btn-primary">Registrarse</button>
        </form>
        <div class="mt-3">
            ¿Tienes una cuenta? <a href="<?php echo BASE_URL; ?>">Iniciar Sesión</a>
            <p id="error" class="text-danger"></p>
        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>js\registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>