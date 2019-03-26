<?php
if(!SessionControl::session_started()) {
    Redirection::redirect(SERVER);
}

$title = 'Profile';

Connection::open_connection();
$user = UserRepository::get_user_by_id(Connection::get_connection(), $_SESSION['id_user']);
Connection::close_connection();
$level = $user->get_level();

include_once 'templates/head_document.inc.php';
include_once 'templates/navbar.inc.php';
include_once 'templates/sidebar.inc.php';

switch ($current_manager) {
  case '':
    include_once 'templates/dashboard.inc.php';
    break;
  case 'calendar_new_projects':
    include_once 'templates/dashboard.inc.php';
    break;
  case 'calendar_projects':
    include_once 'templates/dashboard.inc.php';
    break;
  case 'calendar_my_projects':
    include_once 'templates/dashboard.inc.php';
    break;
  case 'calendar_my_tasks':
    include_once 'templates/dashboard.inc.php';
    break;
  case 'sign_in':
    include_once 'templates/sign_in.inc.php';
    break;
  case 'disable_user':
    include_once 'templates/disable_user.inc.php';
    break;
  case 'enable_user':
    include_once 'templates/enable_user.inc.php';
    break;
  case 'info_project':
    include_once 'templates/info_project.inc.php';
    break;
  case 'info_project_and_services':
    include_once 'templates/info_project_and_services.inc.php';
    break;
  case 'flowchart':
    include_once 'templates/flowchart.inc.php';
    break;
  case 'add_staff':
    include_once 'templates/add_staff.inc.php';
    break;
  case 'edit_single_staff':
    include_once 'templates/edit_single_staff.inc.php';
    break;
  case 'add_cost':
    include_once 'templates/add_cost.inc.php';
    break;
  case 'edit_cost':
    include_once 'templates/edit_cost.inc.php';
    break;
  case 'make_proposal';
    include_once 'templates/make_proposal.inc.php';
    break;
  case 'search':
    include_once 'templates/search.inc.php';
    break;
  case 'reports':
    include_once 'templates/reports.inc.php';
    break;
  case 'edit_user':
    include_once 'templates/edit_user.inc.php';
    break;
  case 'submitted_projects':
    include_once 'templates/submitted_projects.inc.php';
    break;
  case 'award_projects':
    include_once 'templates/award_projects.inc.php';
    break;
  case 'follow_up_projects':
    include_once 'templates/follow_up_projects.inc.php';
    break;
  case 'service':
    include_once 'templates/edit_service.inc.php';
    break;
  case 'contact_list':
    include_once 'templates/contact_list.inc.php';
    break;
  case 'partner_list':
    include_once 'templates/partner_list.inc.php';
    break;
  case 'employee_docs_page':
    include_once 'templates/employee_docs_page.inc.php';
    break;
  case 'fulfillment':
    include_once 'templates/fulfillment.inc.php';
    break;
}
include_once 'templates/end_document.inc.php';
?>
