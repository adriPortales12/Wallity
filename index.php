<?php
// Autoload de clases
spl_autoload_register(function ($class_name) {
    include 'controladores/' . $class_name . '.php';
});

// Obtener la ruta solicitada
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

// Obtener la ruta base de forma dinámica
$script_name = $_SERVER['SCRIPT_NAME'];
$base_url = str_replace(basename($script_name), '', $script_name);

// Eliminar la ruta base de la URI solicitada para obtener la ruta relativa
$route = trim(str_replace($base_url, '', $request_uri[0]), '/');

// Definir constante BASE_URL
define('BASE_URL', $base_url);

switch ($route) {
    case '' :
    case '/' :
        $controller = new ControladorLogin();
        $controller->login();
        break;

    case 'login':
        $controller = new ControladorLogin();
        $controller->verificarLogin();
        break;

    case 'logout':
        $controller = new ControladorLogin();
        $controller->cerrarSesion();
        break;

    case 'registro':
        $controller = new ControladorRegistro();
        $controller->registro();
        break;

    case 'datosRegistro':
        $controller = new ControladorRegistro();
        $controller->registrarUsuario();
        break;

    case 'dashboard':
        $controller = new ControladorDashboard();
        $controller->abrirDashboard();
        break;

    case 'dashboardAdmin':
        $controller = new ControladorDashboard();
        $controller->abrirDashboardAdmin();
        break;

    case 'nuevoGasto':
        $controller = new ControladorNuevoGasto();
        $controller->nuevoGasto();
        break;

    case 'perfil':
        $controller = new ControladorPerfil();
        $controller->abrirPerfil();
        break;

    case 'configuracion':
        $controller = new ControladorConfiguracion();
        $controller->abrirConfiguracion();
        break;

    case 'cambioNombres':
        $controller = new ControladorPerfil();
        $controller->cambioNombres();
        break;

    case 'cambioContrasena':
        $controller = new ControladorPerfil();
        $controller->cambioContrasena();
        break;

    case 'borraGasto':
        $controller = new ControladorBorrarGasto();
        $controller->borrarGasto();
        break;

    case 'modificaGasto':
        $controller = new ControladorModificarGasto();
        $controller->modificarGasto();
        break;

    case 'editarLimite':
        $controller = new ControladorConfiguracion();
        $controller->nuevoLimite();
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Página no encontrada';
        break;
}
