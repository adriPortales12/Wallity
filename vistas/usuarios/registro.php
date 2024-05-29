<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas/estilos/estilosLogin.css">
    <style>
        body {
            background-color: #000; /* Fondo negro */
            font-family: 'Roboto', sans-serif; /* Fuente mejorada */
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-container">
            <img src="<?php echo BASE_URL; ?>vistas/imagenes/VA.png" alt="Logo" class="img-fluid mb-4 logo">
            <h2>Registro</h2>
            <form id="formularioRegistro" class="login-form" action="<?php echo BASE_URL; ?>datosRegistro" method="post">
                <div class="mb-3">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <input type="text" id="nombre_usuario" name="nombre_usuario" class="form-control" placeholder="Nombre de usuario">
                </div>
                <div class="mb-3">
                    <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña">
                </div>
                <div class="mb-3">
                    <input type="password" id="contrasena2" name="contrasena2" class="form-control" placeholder="Repetir contraseña">
                </div>
                <button type="submit" id="botonRegistro" class="btn btn-primary w-100">Registrarse</button>
            </form>
            <div class="mt-3">
                ¿Tienes una cuenta? <a href="<?php echo BASE_URL; ?>">Iniciar Sesión</a>
                <p id="error" class="text-danger"></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo BASE_URL; ?>js/registro.js"></script>
</body>
</html>
