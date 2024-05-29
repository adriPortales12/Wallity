<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="vistas/estilos/estilosLogin.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-container">
            <img src="vistas/imagenes/VA.png" alt="Logo" class="img-fluid mb-4 logo">
            <h2>Iniciar sesión</h2>
            <form id="formularioLogin" class="login-form" action="login" method="post">
                <div class="mb-3">
                    <input id="usuario" type="text" name="usuario" class="form-control" placeholder="Usuario">
                    <p id="errorUsuario"></p>
                </div>
                <div class="mb-3">
                    <input id="contrasena" type="password" name="contrasena" class="form-control" placeholder="Contraseña">
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
            </form>
            <div class="mt-3">
                ¿No tienes una cuenta? <a href="registro">Regístrate</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/login.js"></script>
</body>
</html>
