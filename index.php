<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);
$ruta = $componentes_url['path'];

$partes_ruta = explode('/', $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);
$ruta_elegida = 'vistas/404.php';

if($partes_ruta[0] == 'rfp'){
  if(count($partes_ruta) == 1){
    $ruta_elegida = 'vistas/home.php';
  }else if(count($partes_ruta) == 2){
    switch ($partes_ruta[1]) {
        case 'perfil':
            $gestor_actual = '';
            $ruta_elegida = 'vistas/perfil.php';
            break;
        case 'genera_usuario':
            $ruta_elegida = 'herramientas/genera_usuario.php';
            break;
        case 'logout':
            $ruta_elegida = 'scripts/logout.php';
            break;
    }
  }
}
include_once $ruta_elegida;
?>
