<?php
if (isset($_GET['err'])) {
    echo '<script>alert("Inicio de sesión fallido");</script>';
}

// Autoload de clases
spl_autoload_register(function ($class_name) {
    include 'controladores/' . $class_name . '.php';
});

// Obtener la ruta solicitada
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Enrutamiento
$base_url = '/VirtualWalletSpending';
switch ($request_uri[0]) {
    
    case $base_url . '/' :
        // Redirigir a la acción de inicio de sesión
        $controller = new ControladorLogin();
        $controller->login();
        break;

    case $base_url . '/login':
        $controller = new ControladorLogin();
        $controller->verificarLogin();
        break;

    case '/VirtualWalletSpending/logout':
        $controller = new ControladorLogin();
        $controller->cerrarSesion();
        break;

    case $base_url . '/dashboard':
        $controller = new ControladorDashboard();
        $controller->abrirDashboard();
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Página no encontrada';
        break;
}
