<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VirtualWalletSpending</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>vistas/estilos/dashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .highlight-positive { background-color: #f8d7da; }
        .highlight-negative { background-color: #d4edda; }
    </style>
</head>
<body>
    <header class="py-3">
        <div class="container">
            <h1>Último mes</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="<?php echo BASE_URL ?>dashboard?filtro=mes&limite=<?php echo $usuario->limite ?>">Volver</a></li>
                    <li class="nav-item"><a id="logout" class="nav-link" href="<?php echo BASE_URL; ?>logout">Cerrar sesión</a></li> 
                </ul>
            </nav>
        </div>
    </header>
    <main class="container my-4">
        <div class="card">
            <div class="card-body">
                <h2>Comparación de Gastos por Categoría</h2>
                <input class="form-control mb-3" id="searchInput" type="text" placeholder="Buscar por categoría...">
                <table class="table table-bordered table-striped" id="expensesTable">
                    <thead class="thead-dark">
                        <tr>
                            <th onclick="sortTable(0)">Categoría</th>
                            <th onclick="sortTable(1)">Gastos del Mes Actual</th>
                            <th onclick="sortTable(2)">Gastos del Mes Anterior</th>
                            <th>Diferencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($comparacion)): ?>
                            <?php foreach ($comparacion as $fila): ?>
                                <?php
                                    $class = '';
                                    if (strpos($fila['mensaje_diferencia'], 'más') !== false) {
                                        $class = 'highlight-positive';
                                    } elseif (strpos($fila['mensaje_diferencia'], 'menos') !== false) {
                                        $class = 'highlight-negative';
                                    }
                                ?>
                                <tr class="<?php echo $class; ?>">
                                    <td><?php echo htmlspecialchars($fila['categoria']); ?></td>
                                    <td><?php echo number_format($fila['gastos_actuales'], 2); ?>€</td>
                                    <td><?php echo number_format($fila['gastos_anteriores'], 2); ?>€</td>
                                    <td><?php echo htmlspecialchars($fila['mensaje_diferencia']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No hay datos para mostrar.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <div id="noResultsMessage" class="alert alert-warning" style="display:none;">No se encontraron coincidencias.</div>
                <h3 class="mt-4">
                    Total: <?php echo $total_diferencia > 0 ? "Has gastado " . number_format($total_diferencia, 2) . "€ más que el mes pasado" : "Has gastado " . number_format(abs($total_diferencia), 2) . "€ menos que el mes pasado"; ?>
                </h3>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>js/ultimoMes.js"></script>
</body>
</html>
