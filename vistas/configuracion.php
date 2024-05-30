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
            <h1>Configuración</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link"
                            href="<?php echo BASE_URL; ?>dashboard?filtro=mes&limite=<?php echo $usuario->limite ?>">Volver
                            al Dashboard</a></li>
                    <li class="nav-item"><a id="logout" class="nav-link" href="<?php echo BASE_URL; ?>logout">Cerrar
                            sesión</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!--Limite total-->
    <main class="container my-4">
        <section class="mb-4">
            <h2>Límite total</h2>
            <div class="card card-separator ">
                <div class="card-body">
                    <form id="limite" action="<?php echo BASE_URL; ?>editarLimite" method="post">
                        <div class="mb-3">
                            <label for="limiteInput">Establecer límite:</label>
                            <input id="limiteInput" type="text" class="form-control" name="limite"
                                value="<?php echo $usuario->limite; ?>">
                            <p class="lead">El límite establece un aviso cuando superas el dinero</p>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </section>
        <div class="card card-separator-first"></div>

        <div class="d-flex justify-content-center">
            <section class="card-half m-4 col-6">
                <h2>Límite comida</h2>
                <div class="card">
                    <div class="card-body">
                        <form id="limite" action="<?php echo BASE_URL; ?>editarLimite2" method="post">
                            <div class="mb-3">
                                <label for="limiteInputComida">Establecer límite:</label>
                                <input id="limiteInputComida" type="text" class="form-control" name="limiteInputComida" value="<?php echo $notificacion->limite_comida ?>">

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="card-half m-4 col-6">
                <h2>Límite hogar</h2>
                <div class="card">
                    <div class="card-body">
                        <form id="limite" action="<?php echo BASE_URL; ?>editarLimite2" method="post">
                            <div class="mb-3">
                                <label for="limiteInputHogar">Establecer límite:</label>
                                <input id="limiteInputHogar" type="text" class="form-control" name="limiteInputHogar" value="<?php echo $notificacion->limite_hogar ?>">

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>

        <div class="d-flex justify-content-center">
            <section class="card-half m-4 col-6">
                <h2>Límite ropa</h2>
                <div class="card">
                    <div class="card-body">
                        <form id="limite" action="<?php echo BASE_URL; ?>editarLimite2" method="post">
                            <div class="mb-3">
                                <label for="limiteInputRopa">Establecer límite:</label>
                                <input id="limiteInputRopa" type="text" class="form-control" name="limiteInputRopa" value="<?php echo $notificacion->limite_ropa ?>">

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="card-half m-4 col-6">
                <h2>Límite juegos</h2>
                <div class="card">
                    <div class="card-body">
                        <form id="limite" action="<?php echo BASE_URL; ?>editarLimite2" method="post">
                            <div class="mb-3">
                                <label for="limiteInputJuegos">Establecer límite:</label>
                                <input id="limiteInputJuegos" type="text" class="form-control" name="limiteInputJuegos" value="<?php echo $notificacion->limite_juegos ?>">

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>


        <div class="d-flex justify-content-center">
            <section class="card-half m-4 col-6">
                <h2>Límite viajes</h2>
                <div class="card">
                    <div class="card-body">
                        <form id="limite" action="<?php echo BASE_URL; ?>editarLimite2" method="post">
                            <div class="mb-3">
                                <label for="limiteInputViajes">Establecer límite:</label>
                                <input id="limiteInputViajes" type="text" class="form-control" name="limiteInputViajes" value="<?php echo $notificacion->limite_viajes ?>">

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="card-half m-4 col-6">
                <h2>Límite otros</h2>
                <div class="card">
                    <div class="card-body">
                        <form id="limite" action="<?php echo BASE_URL; ?>editarLimite2" method="post">
                            <div class="mb-3">
                                <label for="limiteInputOtros">Establecer límite:</label>
                                <input id="limiteInputOtros" type="text" class="form-control" name="limiteInputOtros" value="<?php echo $notificacion->limite_otros ?>">

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>

    </main>
    <script src="<?php echo BASE_URL; ?>js\configuracion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>