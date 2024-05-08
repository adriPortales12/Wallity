<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="\VirtualWalletSpending\vistas\estilos\estilosLogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="login-container">
        <h2>Registro</h2>
        <form id="formularioRegistro" class="login-form" action="/VirtualWalletSpending/datosRegistro" method="post">
            <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
            <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Nombre de usuario" required>
            <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña" required>
            <input type="password" id="contraseña2" name="contraseña2" placeholder="Repetir contraseña" required>
            <button type="submit" id="botonRegistro" class="btn btn-primary">Iniciar sesión</button>
        </form>
        <div class="mt-3">
            ¿Tienes una cuenta? <a href="/VirtualWalletSpending/">Iniciar Sesión</a>
            <p id="error" class="text-danger"></p>
        </div>
    </div>
    <script src="\VirtualWalletSpending\js\registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>