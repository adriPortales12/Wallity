<?php

class ControladorConfiguracion
{
    public function __construct()
    {
        require_once 'modelos/Usuario.php';
        session_start();
    }

    function abrirConfiguracion()
    {
        require_once 'modelos/Notificacion.php';

        // Obtenemos el usuario de la sesión
        $usuario = unserialize($_SESSION['usuario']);

        // Creamos una instancia de Notificacion
        $notificacion = new Notificacion();

        // Actualizamos los límites en la tabla de notificaciones
        $notificacion->id_usuario = $usuario->id;
        $limites = $notificacion->datosNotificaciones();

        // Verificamos si se obtuvieron los límites correctamente
        if ($limites) {
            // Asignamos los límites obtenidos al usuario
            $notificacion->limite_comida = $limites[0]->limite_comida;
            $notificacion->limite_hogar = $limites[0]->limite_hogar;
            $notificacion->limite_ropa = $limites[0]->limite_ropa;
            $notificacion->limite_juegos = $limites[0]->limite_juegos;
            $notificacion->limite_viajes = $limites[0]->limite_viajes;
            $notificacion->limite_otros = $limites[0]->limite_otros;
        }

        // Pasamos el usuario con los límites a la vista
        require_once 'vistas/configuracion.php';
    }


    function nuevoLimite()
    {
        $usuario = unserialize($_SESSION['usuario']);

        $usuario->actualizaLimite($_POST['limite']);

        $usuario = $usuario->datosUsuario($usuario->nombre_usuario);

        $_SESSION['usuario'] = serialize($usuario);

        header('Location: ' . BASE_URL . 'configuracion');
    }

    function nuevoLimite2()
    {
        require_once 'modelos/Notificacion.php';
        $usuario = unserialize($_SESSION['usuario']);
        ;
        $notificacion = new Notificacion();
        $notificacion->id_usuario = $usuario->id;

        if (isset($_POST['limiteInputComida'])) {
            $notificacion->limite_comida = $_POST['limiteInputComida'];
            $notificacion->actualizarUnLimite('comida');

        } elseif (isset($_POST['limiteInputHogar'])) {
            $notificacion->limite_hogar = $_POST['limiteInputHogar'];
            $notificacion->actualizarUnLimite('hogar');

        } elseif (isset($_POST['limiteInputRopa'])) {
            $notificacion->limite_ropa = $_POST['limiteInputRopa'];
            $notificacion->actualizarUnLimite('ropa');

        } elseif (isset($_POST['limiteInputJuegos'])) {
            $notificacion->limite_juegos = $_POST['limiteInputJuegos'];
            $notificacion->actualizarUnLimite('juegos');

        } elseif (isset($_POST['limiteInputViajes'])) {
            $notificacion->limite_viajes = $_POST['limiteInputViajes'];
            $notificacion->actualizarUnLimite('viajes');

        } elseif (isset($_POST['limiteInputOtros'])) {
            $notificacion->limite_otros = $_POST['limiteInputOtros'];
            $notificacion->actualizarUnLimite('otros');
        }


        // Redirigimos de nuevo a la página de configuración
        header('Location: ' . BASE_URL . 'configuracion');
    }

}