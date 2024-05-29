<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualWalletSpending</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas\estilos\dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vistas/estilos/estilosPaginasSecundarias.css">
</head>
<body>
    <header class="py-3">
        <div class="container">
            <h1>Gastos</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL . 'dashboard?filtro=' . $_GET['filtro'] . '&limite=' . $_GET['limite']?>">Volver</a></li>
                    <li class="nav-item"><a id="logout" class="nav-link" href="<?php echo BASE_URL; ?>logout">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
    </header>
    <main class="container my-4">
    <section class="mb-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="col-auto">
                    <form action="<?php echo BASE_URL; ?>gastos" method="get" class="d-flex align-items-end">
                        <div class="me-3">
                            <label for="filtro" class="form-label">Filtrar por:</label>
                            <select class="form-control" id="filtro" name="filtro">
                                <option value="mes" <?php echo $_GET['filtro']=='mes' ? 'selected' : '' ?>>Mes</option>
                                <option value="anio" <?php echo $_GET['filtro']=='anio' ? 'selected' : '' ?>>Año</option>
                                <option value="dia" <?php echo $_GET['filtro']=='dia' ? 'selected' : '' ?>>Día</option>
                            </select>
                        </div>
                        <input type="hidden" name="limite" value="<?php echo $usuarioLogin->limite ?>">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </form>
                </div>
                <div class="col-auto d-flex justify-content-center w-100">
                    <button id="openPopupBtn" class="btn btn-primary nuevoGasto">Añadir Gasto</button>
                </div>
            </div>
        </section>

        <section>
            <div class="card">
                <div class="card-body">
                    <h2>Este <?php echo $_GET['filtro']=='anio' ? 'año' : $_GET['filtro'] ?></h2>
                    <?php if (!empty($datos_gastos_filtro)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Categoría</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos_gastos_filtro as $gasto) : ?>
                                <tr>
                                    <td><?php echo $gasto['titulo']; ?></td>
                                    <td><?php echo $gasto['nombre_categoria']; ?></td>
                                    <td><?php echo $gasto['cantidad']; ?>€</td>
                                    <td><?php echo $gasto['fecha_formateada']; ?></td>
                                    <td><button class="modificar-btn btn btn-warning"
                                        data-id="<?php echo $gasto['id']; ?>" data-titulo="<?php echo $gasto['titulo']; ?>"
                                        data-categoria="<?php echo $gasto['nombre_categoria']; ?>"
                                        data-cantidad="<?php echo $gasto['cantidad']; ?>">
                                        Modificar</button></td>
                                    <td>
                                        <form method="post" action="<?php echo BASE_URL; ?>borraGasto">
                                            <input type="hidden" name="id" value="<?php echo $gasto['id']; ?>">
                                            <input type="hidden" name="filtro" value="<?php echo $_GET['filtro']; ?>">
                                            <button type="submit" class="borrar-btn btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <p>No hay ningún gasto.</p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    <h2 class="mt-4">Todos los gastos</h2>
                    <?php if (!empty($datos_gastos)) : ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Categoría</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos_gastos as $gasto) : ?>
                                <tr>
                                    <td><?php echo $gasto['titulo']; ?></td>
                                    <td><?php echo $gasto['nombre_categoria']; ?></td>
                                    <td><?php echo $gasto['cantidad']; ?>€</td>
                                    <td><?php echo $gasto['fecha_formateada']; ?></td>
                                    <td><button class="modificar-btn btn btn-warning"
                                        data-id="<?php echo $gasto['id']; ?>" data-titulo="<?php echo $gasto['titulo']; ?>"
                                        data-categoria="<?php echo $gasto['nombre_categoria']; ?>"
                                        data-cantidad="<?php echo $gasto['cantidad']; ?>">
                                        Modificar</button></td>
                                    <td>
                                        <form method="post" action="<?php echo BASE_URL; ?>borraGasto">
                                            <input type="hidden" name="id" value="<?php echo $gasto['id']; ?>">
                                            <input type="hidden" name="filtro" value="<?php echo $_GET['filtro']; ?>">
                                            <button type="submit" class="borrar-btn btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else : ?>
                        <p>No hay ningún gasto.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Popup para añadir gasto -->
            <div class="modal" id="popupModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Formulario en Popup</h5>
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
                                            <option value="<?php echo $categoria['nombre']; ?>"><?php echo $categoria['nombre']; ?></option>
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
        </section>

        <!-- Popup para modificar gasto -->
        <div class="modal" id="modificarModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modificar Gasto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <form id="modificarGastoForm" action="<?php echo BASE_URL; ?>modificaGasto" method="post">
                            <input type="hidden" id="modificar-id" name="id">
                            <div class="mb-3">
                                <label for="modificar-titulo" class="form-label">Título:</label>
                                <input type="text" class="form-control" id="modificar-titulo" name="titulo">
                            </div>
                            <div class="mb-3">
                                <label for="modificar-categoria" class="form-label">Categoría:</label>
                                <select class="form-control" id="modificar-categoria" name="categoria">
                                    <?php foreach ($listaCategorias as $categoria) { ?>
                                        <option value="<?php echo $categoria['nombre']; ?>"><?php echo $categoria['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="modificar-cantidad" class="form-label">Cantidad:</label>
                                <input type="text" class="form-control" id="modificar-cantidad" name="cantidad">
                            </div>
                            <input type="hidden" name="filtro" value="<?php echo $_GET['filtro']; ?>">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>js\gastos.js"></script>
</body>
</html>
