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
                    <li class="nav-item"><a class="nav-link" href="\VirtualWalletSpending\perfil">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Configuración</a></li>
                    <li class="nav-item"><a id="logout" class="nav-link" href="/VirtualWalletSpending/logout">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
    </header>
    <main class="container my-4">
        <section class="mb-4">
            <h2>Bienvenido, <?php echo $_SESSION['user'] ?></h2>
            <div class="card">
                <div class="card-body">
                    <h3>Gastos del mes:</h3>
                    <p class="card-text p-3"><?php echo (isset($gastosSuma[0]['total_gastos']) ? $gastosSuma[0]['total_gastos'] : 0) . '€ gastados desde ' . $fecha_ultimo_filtro; ?></p>
                </div>
                <div class="col-2 mb-3 mx-3">
                <form action="/VirtualWalletSpending/dashboard" method="get">
                    <div class="mb-3">
                        <label for="filtro" class="form-label">Filtrar por:</label>
                        <select class="form-control" id="filtro" name="filtro">
                            <option value="mes" <?php echo $_GET['filtro']=='mes' ? 'selected' : '' ?> >Mes</option>
                            <option value="anio"  <?php echo $_GET['filtro']=='anio' ? 'selected' : '' ?>  >Año</option>
                            <option value="dia"  <?php echo $_GET['filtro']=='dia' ? 'selected' : '' ?>  >Día</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </form>
                </div>
            </div>
            <div class="container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <button id="openPopupBtn" class="btn btn-primary mt-3 nuevoGasto">Añadir Gasto</button>
                </div>
            </div>
        </section>
        <section>
        
    <h2>Este <?php echo $_GET['filtro']=='anio' ? 'año' : $_GET['filtro'] ?></h2>
    <div class="card">
        <div class="card-body">
        <?php if (!empty($datos_gastos_filtro)) : ?>
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
                <?php foreach ($datos_gastos_filtro as $gasto) : ?>
                    <tr>
                        <td><?php echo $gasto['titulo']; ?></td>
                        <td><?php echo $gasto['nombre_categoria']; ?></td>
                        <td><?php echo $gasto['cantidad']; ?>€</td>
                        <td><?php echo $gasto['fecha_formateada']; ?></td>
                        <td>
                            <form method="post" action="/VirtualWalletSpending/borraGasto">
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
    <h2 class="mt-4">Todos los gastos</h2>
    <div class="card">
        <div class="card-body">
        <?php if (!empty($datos_gastos)) : ?>
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
                        <td><?php echo $gasto['cantidad']; ?>€</td>
                        <td><?php echo $gasto['fecha_formateada']; ?></td>
                        <td>
                            <form method="post" action="/VirtualWalletSpending/borraGasto">
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

<div class="modal" id="popupModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Formulario en Popup</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    
                <form id="formularioGasto" action="/VirtualWalletSpending/nuevoGasto" method="post">
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
    </main>
    <script src="\VirtualWalletSpending\js\dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>