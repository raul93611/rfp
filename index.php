<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);
$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);
$ruta_elegida = 'vistas/404.php';

if($partes_ruta[0] == 'rfp'){
  if(count($partes_ruta) == 1){
    $ruta_elegida = 'vistas/home.php';
  }
}
?>
