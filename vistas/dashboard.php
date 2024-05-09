<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="\VirtualWalletSpending\vistas\estilos\dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="py-3">
        <div class="container">
            <h1>Dashboard</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Configuración</a></li>
                    <li class="nav-item"><a class="nav-link" href="/VirtualWalletSpending/logout">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
    </header>
    <main class="container my-4">
        <section class="mb-4">
            <h2>Bienvenido <?php echo $_SESSION['user'] ?></h2>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">Aquí puedes agregar contenido de resumen utilizando las clases de Bootstrap.</p>
                </div>
            </div>
        </section>
        <section>
            <h2>Gastos Recientes</h2>
            <div class="card">
                <div class="card-body">
                    <ul class="list-group">
                        <?php foreach ($datos_gastos as $gasto) : ?>
                            <li class="list-group-item"><?php echo $gasto['titulo']; ?> - <?php echo $gasto['cantidad']; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>