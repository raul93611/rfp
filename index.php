<?php
include_once 'app/config.inc.php';
include_once 'app/Connection.inc.php';
include_once 'app/SessionControl.inc.php';
include_once 'app/Redirection.inc.php';

include_once '../rfq/app/Conexion.inc.php';

include_once 'app/User.inc.php';
include_once 'app/UserRepository.inc.php';
include_once 'app/UserValidator.inc.php';
include_once 'app/UserLoginValidator.inc.php';
include_once 'app/UserSignInValidator.inc.php';

include_once '../rfq/app/Usuario.inc.php';
include_once '../rfq/app/RepositorioUsuario.inc.php';

include_once '../rfq/app/Rfq.inc.php';
include_once '../rfq/app/RepositorioRfq.inc.php';

include_once '../rfq/app/Item.inc.php';
include_once '../rfq/app/RepositorioItem.inc.php';

include_once '../rfq/app/Provider.inc.php';
include_once '../rfq/app/RepositorioProvider.inc.php';

include_once '../rfq/app/Subitem.inc.php';
include_once '../rfq/app/RepositorioSubitem.inc.php';

include_once '../rfq/app/RfpConnection.inc.php';
include_once '../rfq/app/RepositorioRfpConnection.inc.php';

include_once 'app/Project.inc.php';
include_once 'app/ProjectRepository.inc.php';

include_once 'app/Service.inc.php';
include_once 'app/ServiceRepository.inc.php';

include_once 'app/Staff.inc.php';
include_once 'app/StaffRepository.inc.php';

include_once 'app/Cost.inc.php';
include_once 'app/CostRepository.inc.php';

include_once 'app/Comment.inc.php';
include_once 'app/CommentRepository.inc.php';

include_once 'app/Task.inc.php';
include_once 'app/TaskRepository.inc.php';

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
        case 'save_project':
          $chosen_route = 'scripts/save_project.php';
          break;
        case 'save_task':
          $chosen_route = 'scripts/save_task.php';
          break;
        case 'send_error_quote_email':
          $chosen_route = 'scripts/send_error_quote_email.php';
          break;
    }
  }else if(count($parts_route) == 3){
    switch($parts_route[1]){
      case 'profile':
        switch ($parts_route[2]) {
          case 'sign_in':
            $current_manager = 'sign_in';
            $chosen_route = 'views/profile.php';
            break;
          case 'calendar_new_projects':
            $current_manager = 'calendar_new_projects';
            $chosen_route = 'views/profile.php';
            break;
          case 'calendar_projects':
            $current_manager = 'calendar_projects';
            $chosen_route = 'views/profile.php';
            break;
          case 'calendar_my_projects':
            $current_manager = 'calendar_my_projects';
            $chosen_route = 'views/profile.php';
            break;
          case 'search':
            $current_manager = 'search';
            $chosen_route = 'views/profile.php';
            break;
          case 'reports':
            $current_manager = 'reports';
            $chosen_route = 'views/profile.php';
            break;
          default:
            break;
        }
        break;
      case 'enable_user':
        $id_user = $parts_route[2];
        $chosen_route = 'scripts/enable_user.inc.php';
        break;
      case 'disable_user':
        $id_user = $parts_route[2];
        $chosen_route = 'scripts/disable_user.inc.php';
        break;
      case 'save_info_project':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_info_project.php';
        break;
      case 'save_flowchart':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_flowchart.php';
        break;
      case 'delete_project':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/delete_project.php';
        break;
      case 'save_info_project_and_services':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_info_project_and_services.php';
        break;
      case 'save_staff':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_staff.php';
        break;
      case 'save_edit_single_staff':
        $id_staff = $parts_route[2];
        $chosen_route = 'scripts/save_edit_single_staff.php';
        break;
      case 'save_cost':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_cost.php';
        break;
      case 'save_edit_cost':
        $id_cost = $parts_route[2];
        $chosen_route = 'scripts/save_edit_cost.php';
        break;
      case 'save_proposal_data1':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_proposal_data1.php';
        break;
      case 'save_proposal_data2':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_proposal_data2.php';
        break;
      case 'generate_proposal1':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/generate_proposal1.php';
        break;
      case 'generate_proposal2':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/generate_proposal2.php';
        break;
      case 'save_edit_user':
        $id_user = $parts_route[2];
        $chosen_route = 'scripts/save_edit_user.php';
        break;
      }
  }else if(count($parts_route) == 4){
    if($parts_route[1] == 'profile'){
      switch ($parts_route[2]) {
        case 'info_project':
          $id_project = $parts_route[3];
          $current_manager = 'info_project';
          $chosen_route = 'views/profile.php';
          break;
        case 'info_project_and_services':
          $id_project = $parts_route[3];
          $current_manager = 'info_project_and_services';
          $chosen_route = 'views/profile.php';
          break;
        case 'flowchart':
          $id_project = $parts_route[3];
          $current_manager = 'flowchart';
          $chosen_route = 'views/profile.php';
          break;
        case 'add_staff':
          $id_project = $parts_route[3];
          $current_manager = 'add_staff';
          $chosen_route = 'views/profile.php';
          break;
        case 'edit_single_staff':
          $id_staff = $parts_route[3];
          $current_manager = 'edit_single_staff';
          $chosen_route = 'views/profile.php';
          break;
        case 'add_cost':
          $id_project = $parts_route[3];
          $current_manager = 'add_cost';
          $chosen_route = 'views/profile.php';
          break;
        case 'edit_cost':
          $id_cost = $parts_route[3];
          $current_manager = 'edit_cost';
          $chosen_route = 'views/profile.php';
          break;
        case 'make_proposal1':
          $id_project = $parts_route[3];
          $current_manager = 'make_proposal1';
          $chosen_route = 'views/profile.php';
          break;
        case 'make_proposal2':
          $id_project = $parts_route[3];
          $current_manager = 'make_proposal2';
          $chosen_route = 'views/profile.php';
          break;
        case 'edit_user':
          $id_user = $parts_route[3];
          $current_manager = 'edit_user';
          $chosen_route = 'views/profile.php';
          break;
        default:
          break;
      }
    }
    if($parts_route[1] == 'delete_document'){
      $id_project = $parts_route[2];
      $file = $parts_route[3];
      $chosen_route = 'scripts/delete_document.php';
    }
  }
}
include_once $chosen_route;
?>
