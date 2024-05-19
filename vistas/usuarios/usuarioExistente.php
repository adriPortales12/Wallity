<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">¡Error!</h4>
            <p>El usuario ya existe en nuestro sistema.</p>
            <hr>
            <p class="mb-0">Por favor, intenta con otro nombre de usuario.</p>
        </div>
        <div class="d-flex justify-content-center"> <!-- Agregamos clases para centrar horizontalmente -->
            <a href="registro.php" class="btn btn-primary">Volver al registro</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>