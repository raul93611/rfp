<?php
if(!SessionControl::session_started()) {
    Redirection::redirect1(SERVER);
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
  case 'calendar_projects':
    include_once 'templates/dashboard.inc.php';
    break;
  case 'calendar_my_projects':
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
}
include_once 'templates/end_document.inc.php';
?>
