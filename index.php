<?php
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
         $controller = new ControladorLogin();
         $controller->login();
         break;

    case $base_url . '/login':
         $controller = new ControladorLogin();
         $controller->verificarLogin();
         break;

    case $base_url . '/logout':
         $controller = new ControladorLogin();
         $controller->cerrarSesion();
         break;

    case $base_url . '/registro':
         $controller = new ControladorRegistro();
         $controller->registro();
         break;

    case $base_url . '/datosRegistro':
         $controller = new ControladorRegistro();
         $controller->registrarUsuario();
         break;

    case $base_url . '/dashboard':
         $controller = new ControladorDashboard();
         $controller->abrirDashboard();
         break;

     case $base_url . '/dashboardAdmin':
         $controller = new ControladorDashboard();
         $controller->abrirDashboardAdmin();
         break;

         case $base_url . '/nuevoGasto':
          $controller = new ControladorNuevoGasto();
          $controller->nuevoGasto();
          break;

    default:
         header('HTTP/1.0 404 Not Found');
         echo 'Página no encontrada';
         break;
}
