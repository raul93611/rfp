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

include_once '../rfq/app/RepositorioComment.inc.php';

include_once '../rfq/app/Item.inc.php';
include_once '../rfq/app/RepositorioItem.inc.php';

include_once '../rfq/app/Provider.inc.php';
include_once '../rfq/app/RepositorioProvider.inc.php';

include_once '../rfq/app/Subitem.inc.php';
include_once '../rfq/app/RepositorioSubitem.inc.php';

include_once '../rfq/app/Cuestionario.inc.php';
include_once '../rfq/app/RepositorioCuestionario.inc.php';

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

include_once 'app/PartnerList.inc.php';
include_once 'app/PartnerListRepository.inc.php';

include_once 'app/ContactList.inc.php';
include_once 'app/ContactListRepository.inc.php';

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
      case 'save_staff':
        $chosen_route = 'scripts/save_staff.php';
        break;
      case 'save_cost':
        $chosen_route = 'scripts/save_cost.php';
        break;
      case 'save_edit_service':
        $chosen_route = 'scripts/save_edit_service.php';
        break;
      case 'save_info_project_and_services':
        $chosen_route = 'scripts/save_info_project_and_services.php';
        break;
      case 'save_contact':
        $chosen_route = 'scripts/save_contact.php';
        break;
      case 'save_new_partner':
        $chosen_route = 'scripts/save_new_partner.php';
        break;
      case 'save_partner':
        $chosen_route = 'scripts/save_partner.php';
        break;
      case 'recover_password_form':
        $chosen_route = 'tools/recover_password_form.php';
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
          case 'calendar_my_tasks':
            $current_manager = 'calendar_my_tasks';
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
          case 'submitted_projects':
            $current_manager = 'submitted_projects';
            $chosen_route = 'views/profile.php';
            break;
          case 'award_projects':
            $current_manager = 'award_projects';
            $chosen_route = 'views/profile.php';
            break;
          case 'follow_up_projects':
            $current_manager = 'follow_up_projects';
            $chosen_route = 'views/profile.php';
            break;
          case 'contact_list':
            $current_manager = 'contact_list';
            $chosen_route = 'views/profile.php';
            break;
          case 'partner_list':
            $current_manager = 'partner_list';
            $chosen_route = 'views/profile.php';
            break;
          case 'employee_docs_page':
            $current_manager = 'employee_docs_page';
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
      case 'delete_only_project':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/delete_only_project.php';
        break;
      case 'save_edit_single_staff':
        $id_staff = $parts_route[2];
        $chosen_route = 'scripts/save_edit_single_staff.php';
        break;
      case 'save_edit_cost':
        $id_cost = $parts_route[2];
        $chosen_route = 'scripts/save_edit_cost.php';
        break;
      case 'save_proposal_data':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/save_proposal_data.php';
        break;
      case 'generate_proposal':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/generate_proposal.php';
        break;
      case 'save_edit_user':
        $id_user = $parts_route[2];
        $chosen_route = 'scripts/save_edit_user.php';
        break;
      case 'completed_task':
        $id_task = $parts_route[2];
        $chosen_route = 'scripts/completed_task.php';
        break;
      case 'delete_single_staff':
        $id_single_staff = $parts_route[2];
        $chosen_route = 'scripts/delete_single_staff.php';
        break;
      case 'delete_cost':
        $id_cost = $parts_route[2];
        $chosen_route = 'scripts/delete_cost.php';
        break;
      case 'add_service':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/add_service.php';
        break;
      case 'delete_service':
        $id_service = $parts_route[2];
        $chosen_route = 'scripts/delete_service.php';
        break;
      case 'add_previous_contract':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/add_previous_contract.php';
        break;
      case 'load_modal':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/load_modal.php';
        break;
      case 'load_modal_partner':
        $id_partner = $parts_route[2];
        $chosen_route = 'scripts/load_modal_partner.php';
        break;
      case 'load_img':
        $id_project = $parts_route[2];
        $chosen_route = 'scripts/load_img.php';
        break;
      case 'restart_password':
        $hash = $parts_route[2];
        $chosen_route = 'tools/restart_password.php';
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
          $id_service = $parts_route[3];
          $current_manager = 'add_staff';
          $chosen_route = 'views/profile.php';
          break;
        case 'edit_single_staff':
          $id_staff = $parts_route[3];
          $current_manager = 'edit_single_staff';
          $chosen_route = 'views/profile.php';
          break;
        case 'add_cost':
          $id_service = $parts_route[3];
          $current_manager = 'add_cost';
          $chosen_route = 'views/profile.php';
          break;
        case 'edit_cost':
          $id_cost = $parts_route[3];
          $current_manager = 'edit_cost';
          $chosen_route = 'views/profile.php';
          break;
        case 'make_proposal':
          $id_project = $parts_route[3];
          $current_manager = 'make_proposal';
          $chosen_route = 'views/profile.php';
          break;
        case 'edit_user':
          $id_user = $parts_route[3];
          $current_manager = 'edit_user';
          $chosen_route = 'views/profile.php';
          break;
        case 'service':
          $id_service = $parts_route[3];
          $current_manager = 'service';
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
