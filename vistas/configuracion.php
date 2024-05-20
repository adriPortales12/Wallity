<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas\estilos\dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="py-3">
        <div class="container">
            <h1>Configuración</h1>
            <nav>
                <ul class="nav">
                <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>dashboard?filtro=mes&limite=<?php echo $usuario->limite ?>">Volver al Dashboard</a></li>
                    <li class="nav-item"><a id="logout" class="nav-link" href="<?php echo BASE_URL; ?>logout">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
    </header>
    <main class="container my-4">
        <section class="mb-4">
            <h2>Tu cuenta</h2>
            <div class="card">
                <div class="card-body">
                    <form id="limite" action="<?php echo BASE_URL; ?>editarLimite" method="post">
                        <div class="mb-3">
                            <label for="limiteInput">Establecer límite:</label>
                            <input id="limiteInput" type="text" class="form-control" name="limite" value="<?php echo $usuario->limite; ?>">
                            <p class="lead">El límite establece un aviso cuando superas el dinero</p>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="<?php echo BASE_URL; ?>js\configuracion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
