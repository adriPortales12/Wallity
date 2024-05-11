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
                    <h3>Gastos del mes:</h3>
                    <p class="card-text p-3"><?php echo (isset($gastosMes[0]['total_gastos']) ? $gastosMes[0]['total_gastos'] : 0) . '€ gastados desde ' . $fecha_ultimo_mes; ?></p>
                </div>
            </div>
        </section>
        <section>
    <h2>Gastos</h2>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos_gastos as $gasto) : ?>
                        <tr>
                            <td><?php echo $gasto['titulo']; ?></td>
                            <td><?php echo $gasto['nombre_categoria']; ?></td>
                            <td><?php echo $gasto['cantidad']; ?></td>
                            <td><?php echo $gasto['fecha_formateada']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<div class="container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <button id="openPopupBtn" class="btn btn-primary mt-3 nuevoGasto">Añadir Gasto</button>
    </div>
</div>
<div class="modal" id="popupModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulario en Popup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    
                    <form action="/VirtualWalletSpending/nuevoGasto" method="post">
                        
                        <div class="mb-3">
                            <label for="Titulo" class="form-label">Titulo:</label>
                            <input type="text" class="form-control" id="titulo" name="titulo">
                        </div>
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría:</label>
                            <input type="number" class="form-control" id="categoria" name="categoria">
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad">
                        </div>
                        
                        <button id="enviarGasto" type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
    </main>
    <script src="\VirtualWalletSpending\js\dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>