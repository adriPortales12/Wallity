<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="\VirtualWalletSpending\vistas\estilos\estilosLogin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar sesión</h2>
        <form class="login-form" action="/VirtualWalletSpending/login" method="post">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
        <div class="mt-3">
            ¿No tienes una cuenta? <a href="/VirtualWalletSpending/registro">Regístrate</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

