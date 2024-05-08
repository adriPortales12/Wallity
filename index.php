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
switch ($request_uri[0]) {
    case '/VirtualWalletSpending/' :
        // Redirigir a la acción de inicio de sesión
        $controller = new ControladorLogin();
        $controller->login();
        break;
    case '/VirtualWalletSpending/login':
        $controller = new ControladorLogin();
        if($controller->verificarLogin()){
            echo 'si';
        }else{
            'no';
        }
        break;
    case '/VirtualWalletSpending/dashboard':
        echo 'Dashboard';
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Página no encontrada';
        break;
}
