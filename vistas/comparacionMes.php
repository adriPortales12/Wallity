<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas\estilos\dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <header class="py-3">
        <div class="container">
            <h1>Dashboard</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link"
                        href="<?php echo BASE_URL ?>dashboard?filtro=mes&limite=<?php echo $usuario->limite ?>">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>perfil">Perfil</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL; ?>configuracion">Configuración</a></li>
                    <li class="nav-item"><a id="logout" class="nav-link" href="<?php echo BASE_URL; ?>logout">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
    </header>
    <main class="container my-4">
    <div class="card">
    <div class="card-body">
                    <?php if (!empty($gastosMesPasado)) : ?>
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
                            <?php foreach ($gastosMesPasado as $gasto) : ?>
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
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>