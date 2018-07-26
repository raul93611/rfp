<?php
include_once 'app/config.inc.php';
include_once 'app/Connection.inc.php';
include_once 'app/SessionControl.inc.php';
include_once 'app/Redirection.inc.php';

include_once 'app/User.inc.php';
include_once 'app/UserRepository.inc.php';
include_once 'app/UserValidator.inc.php';
include_once 'app/UserLoginValidator.inc.php';
include_once 'app/UserSignInValidator.inc.php';

$url_components = parse_url($_SERVER['REQUEST_URI']);
$route = $url_components['path'];

$parts_route = explode('/', $route);
$parts_route = array_filter($parts_route);
$parts_route = array_slice($parts_route, 0);
$chosen_route = 'views/404.php';

if($parts_route[0] == 'rfp'){
  if(count($parts_route) == 1){
    $chosen_route = 'views/home.php';
  }else if(count($parts_route) == 2){
    switch ($parts_route[1]) {
        case 'profile':
            $current_manager = '';
            $chosen_route = 'views/profile.php';
            break;
        case 'generate_user':
            $chosen_route = 'tools/generate_user.php';
            break;
        case 'log_out':
            $chosen_route = 'scripts/log_out.php';
            break;
    }
  }else if(count($parts_route) == 3){
    if($parts_route[1] == 'profile'){
      switch ($parts_route[2]) {
        case 'sign_in':
          $current_manager = 'sign_in';
          $chosen_route = 'views/profile.php';
          break;
        case 'disable_user':
          $current_manager = 'disable_user';
          $chosen_route = 'views/profile.php';
          break;
        default:
          break;
      }
    }
  }else if(count($parts_route) == 4){
    if($parts_route[1] == 'profile'){
      switch ($parts_route[2]) {
        case 'disable_user':
          $id_user = $parts_route[3];
          $current_manager = 'disable_user';
          $chosen_route = 'views/profile.php';
          break;
        case 'enable_user':
          $id_user = $parts_route[3];
          $current_manager = 'enable_user';
          $chosen_route = 'views/profile.php';
          break;
        default:
          break;
      }
    }
  }
}
include_once $chosen_route;
?>
