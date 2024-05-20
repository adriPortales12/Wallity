<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas\estilos\estilosLogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form id="formularioLogin" class="login-form" action="<?php echo BASE_URL; ?>login" method="post">
            <input id="usuario" type="text" name="usuario" placeholder="Usuario">
            <p id="errorUsuario"></p>
            <input id="contrasena" type="password" name="contrasena" placeholder="Contraseña">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
        <div class="mt-3">
            ¿No tienes una cuenta? <a href="<?php echo BASE_URL; ?>registro">Regístrate</a>
        </div>
    </div>
    <script src="<?php echo BASE_URL; ?>js\login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

