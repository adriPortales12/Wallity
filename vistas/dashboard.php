<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualWalletSpending</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas/estilos/dashboard.css">
</head>

<body>
    <header class="header-container">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <img src="<?php echo BASE_URL; ?>vistas/imagenes/VA.png" alt="Logo" class="img-fluid"
                    style="max-width: 80px; height: auto;">
            </div>
            <h1 class="m-0">Inicio</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link text-white" href="<?php echo BASE_URL; ?>perfil">Perfil</a>
                    </li>
                    <li class="nav-item"><a class="nav-link text-white"
                            href="<?php echo BASE_URL; ?>configuracion">Configuración</a></li>
                    <li class="nav-item"><a id="logout" class="nav-link text-white"
                            href="<?php echo BASE_URL; ?>logout">Cerrar sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container my-4">
        <section class="mb-4">
            <h2 class="text-light">Bienvenido, <?php echo $_SESSION['user'] ?></h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3>Gastos del <?php echo $_GET['filtro'] == 'anio' ? 'año' : $_GET['filtro'] ?>:</h3>
                            <p id="gastosSumaValue" class="card-text p-3">
                                <?php echo (isset($gastosSuma[0]['total_gastos']) ? $gastosSuma[0]['total_gastos'] : 0) . '€ gastados desde ' . $fecha_ultimo_filtro; ?>
                            </p>
                        </div>
                        <div class="col-12 mb-3">
                            <form action="<?php echo BASE_URL; ?>dashboard" method="get">
                                <div class="mb-3">
                                    <label for="filtro" class="form-label">Filtrar por:</label>
                                    <select class="form-control" id="filtro" name="filtro">
                                        <option value="mes" <?php echo $_GET['filtro'] == 'mes' ? 'selected' : '' ?>>Mes
                                        </option>
                                        <option value="anio" <?php echo $_GET['filtro'] == 'anio' ? 'selected' : '' ?>>Año
                                        </option>
                                        <option value="dia" <?php echo $_GET['filtro'] == 'dia' ? 'selected' : '' ?>>Día
                                        </option>
                                    </select>
                                </div>
                                <input type="hidden" name="limite" value="<?php echo $usuarioLogin->limite ?>">
                                <input type="hidden" name="limite_comida" value="<?php echo $limites[0]->limite_comida ?>">
                                <input type="hidden" name="limite_hogar" value="<?php echo $limites[0]->limite_hogar ?>">
                                <input type="hidden" name="limite_ropa" value="<?php echo $limites[0]->limite_ropa ?>">
                                <input type="hidden" name="limite_juegos" value="<?php echo $limites[0]->limite_juegos ?>">
                                <input type="hidden" name="limite_viajes" value="<?php echo $limites[0]->limite_viajes ?>">
                                <input type="hidden" name="limite_otros" value="<?php echo $limites[0]->limite_otros ?>">
                                
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-body">
                            <h3 class="text-center">Opciones:</h3>

                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <a href="<?php echo BASE_URL . 'gastos?filtro=' . $_GET['filtro'] . '&limite=' . $_GET['limite'] ?>"
                                    class="btn btn-primary mt-3">Ver Gastos</a>
                            </div>

                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <button id="openPopupBtn" class="btn btn-primary mt-3 nuevoGasto">Añadir Gasto</button>
                            </div>

                            <div class="col-12 d-flex align-items-center justify-content-center">
                                <form action="<?php echo BASE_URL; ?>ultimoMes" method="post">
                                    <button type="submit" class="btn btn-primary mt-3">Comparar con el último
                                        Mes</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <input type="hidden" id="jsonDatos"
                    value="<?php echo htmlspecialchars($datos_gastos_json, ENT_QUOTES, 'UTF-8') ?>"></input>
                <div class="col-md-6">
                    <div class="card grafico">
                        <div class="card-body">
                            <h3>Gastos del <?php echo $_GET['filtro'] == 'anio' ? 'año' : $_GET['filtro'] ?>:</h3>
                            <?php if (!empty($datos_gastos_filtro)): ?>
                                <canvas id="grafico"></canvas>
                            <?php else: ?>
                                <p>No hay ningún gasto.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Popup para añadir gasto -->
        <div class="modal fade" id="popupModal" tabindex="-1" aria-labelledby="popupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="popupModalLabel">Añadir Gasto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">

                        <form id="formularioGasto" action="<?php echo BASE_URL; ?>nuevoGasto" method="post">
                            <input type="hidden" name="filtro" value="<?php echo $_GET['filtro'] ?>">

                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo:</label>
                                <input type="text" class="form-control" id="titulo" name="titulo">
                            </div>

                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoría:</label>
                                <select class="form-control" id="categoria" name="categoria">
                                    <?php foreach ($listaCategorias as $categoria) { ?>
                                        <option value="<?php echo $categoria['nombre']; ?>">
                                            <?php echo $categoria['nombre']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
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
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?php echo BASE_URL; ?>js/dashboard.js"></script>
    <script src="<?php echo BASE_URL; ?>js/grafico.js"></script>
</body>

</html>