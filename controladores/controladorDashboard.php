<?php
class ControladorDashboard{

    public function __construct(){
        session_start();
        if(!isset($_SESSION['usuario'])){
            header('Location: ' . BASE_URL);
        }
    }

    function abrirDashboard(){
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Categoria.php';
        require_once 'modelos/Usuario.php';
        require_once 'modelos/Notificacion.php';

        $_SESSION['ultimoDashboard'] = 'dashboard';

        $usuarioLogin = unserialize($_SESSION['usuario']);

        $notificacion = new Notificacion();
        $notificacion->id_usuario = $usuarioLogin->id;
        $limites = $notificacion->datosNotificaciones();


        $gastos = new Gastos();
        $datos_gastos = $gastos->datosGastos($_SESSION['user']); //lista de gastos del usuario
        $categoria = new Categoria();
        $listaCategorias = $categoria->listaCategorias();

        //Ahora depende del filtro que haya puesto el usuario, son los mismos datos pero hasta fechas diferentes
        if(!isset($_GET) || $_GET['filtro']=='mes'){
            $datos_gastos_filtro = $gastos->gastosMes($_SESSION['user']); //la misma lista de gastos pero del ultimo mes
            $gastosSuma = $gastos->totalGastoMes($_SESSION['user']); //total dinero gastado en el mes
            $fecha_ultimo_filtro = date('d-M-Y', strtotime('-1 month'));
            $datos_gastos_json = json_encode($datos_gastos_filtro);

        }elseif($_GET['filtro']=='anio'){
            $datos_gastos_filtro = $gastos->gastosAnio($_SESSION['user']);
            $gastosSuma = $gastos->totalGastoAnio($_SESSION['user']); //total dinero gastado en el mes
            $fecha_ultimo_filtro = date('d-M-Y', strtotime('-1 year'));
            $datos_gastos_json = json_encode($datos_gastos_filtro);

        }elseif($_GET['filtro']=='dia'){
            $datos_gastos_filtro = $gastos->gastosDia($_SESSION['user']);
            $gastosSuma = $gastos->totalGastoDia($_SESSION['user']); //total dinero gastado en el mes
            $fecha_ultimo_filtro = date('d-M-Y', strtotime('-1 day'));
            $datos_gastos_json = json_encode($datos_gastos_filtro);
        }
        

        require_once 'vistas/dashboard.php';
    }


    function verGastos(){
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Categoria.php';
        require_once 'modelos/Usuario.php';

        $_SESSION['ultimoDashboard'] = 'gastos';

        $usuarioLogin = unserialize($_SESSION['usuario']);


        $gastos = new Gastos();
        $datos_gastos = $gastos->datosGastos($_SESSION['user']); //lista de gastos del usuario
        $categoria = new Categoria();
        $listaCategorias = $categoria->listaCategorias();
        
        $datos_gastos_json = $gastos->gastosMes($_SESSION['user']);

        //Ahora depende del filtro que haya puesto el usuario, son los mismos datos pero hasta fechas diferentes
        if(!isset($_GET) || $_GET['filtro']=='mes'){
            $datos_gastos_filtro = $gastos->gastosMes($_SESSION['user']); //la misma lista de gastos pero del ultimo mes
            $gastosSuma = $gastos->totalGastoMes($_SESSION['user']); //total dinero gastado en el mes
            $fecha_ultimo_filtro = date('d-M-Y', strtotime('-1 month'));
            

        }elseif($_GET['filtro']=='anio'){
            $datos_gastos_filtro = $gastos->gastosAnio($_SESSION['user']);
            $gastosSuma = $gastos->totalGastoAnio($_SESSION['user']); //total dinero gastado en el mes
            $fecha_ultimo_filtro = date('d-M-Y', strtotime('-1 year'));
            

        }elseif($_GET['filtro']=='dia'){
            $datos_gastos_filtro = $gastos->gastosDia($_SESSION['user']);
            $gastosSuma = $gastos->totalGastoDia($_SESSION['user']); //total dinero gastado en el mes
            $fecha_ultimo_filtro = date('d-M-Y', strtotime('-1 day'));
            
        }
        

        require_once 'vistas/dashboardGastos.php';
    }
}