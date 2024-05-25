<?php
class ControladorUltimoMes {

    function __construct() {
        session_start();
        require_once 'modelos/Gastos.php';
        require_once 'modelos/Usuario.php';
        require_once 'modelos/Categoria.php';
    }

    function verComparacion() {
        $usuario = unserialize($_SESSION['usuario']);
        $gastos = new Gastos();
        $categoria = new Categoria();

        $listaCategorias = $categoria->listaCategorias();

        $mes_actual = date('m');
        $mes_anterior = date('m', strtotime('-1 month'));
        $comparacion = [];
        $total_diferencia = 0;

        foreach ($listaCategorias as $cat) {
            $nombre_categoria = $cat['nombre'];

            $gastos_actuales = $gastos->gastosCategoria($usuario->nombre_usuario, $nombre_categoria, $mes_actual);

            $gastos_anteriores = $gastos->gastosCategoria($usuario->nombre_usuario, $nombre_categoria, $mes_anterior);

            $total_gastos_actuales = array_sum(array_column($gastos_actuales, 'cantidad'));
            $total_gastos_anteriores = array_sum(array_column($gastos_anteriores, 'cantidad'));

            $diferencia = $total_gastos_actuales - $total_gastos_anteriores;
            $total_diferencia += $diferencia;
            if ($diferencia > 0) {
                $mensaje_diferencia = "Has gastado " . number_format($diferencia, 2) . "€ más que el mes pasado";
            } elseif ($diferencia < 0) {
                $mensaje_diferencia = "Has gastado " . number_format(abs($diferencia), 2) . "€ menos que el mes pasado";
            } else {
                $mensaje_diferencia = "Has gastado lo mismo que el mes pasado";
            }

            $comparacion[] = [
                'categoria' => $nombre_categoria,
                'gastos_actuales' => $total_gastos_actuales,
                'gastos_anteriores' => $total_gastos_anteriores,
                'mensaje_diferencia' => $mensaje_diferencia
            ];
        }

        require_once 'vistas/comparacionMes.php';
    }
}
