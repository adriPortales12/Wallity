<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualWalletSpending</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas\estilos\dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="py-3">
        <div class="container">
            <h1>Perfil</h1>
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
            <h2>Editar Perfil</h2>
            <div class="card">
                <div class="card-body">
                    <form id="cambioNombre" action="<?php echo BASE_URL; ?>cambioNombres" method="post">
                        <div class="mb-3">
                            <label for="nombre">Nombre:</label>
                            <input id="nombre" type="text" class="form-control" name="nombre" value="<?php echo $usuario->nombre; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="nombre_usuario">Nombre de Usuario:</label>
                            <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario" value="<?php echo $usuario->nombre_usuario; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">
                    <form id="cambioContrasena" action="<?php echo BASE_URL; ?>cambioContrasena" method="post">
                    <div class="mb-3">
                            <label for="nombre_usuario">Contraseña nueva:</label>
                            <input id="contrasena" type="password" class="form-control" name="contrasena">
                        </div>
                        <div class="mb-3">
                            <label for="nombre_usuario">Repetir contraseña nueva:</label>
                            <input id="contrasena2" type="password" class="form-control" name="contrasena2">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <script src="<?php echo BASE_URL; ?>js\perfil.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
