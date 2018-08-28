<?php
if(isset($_POST['save_staff'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $_POST['id_project']);
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $project-> get_id());
  $staff = new Staff('', $service-> get_id(), $_POST['name'], $_POST['hourly_rate'], $_POST['rate'], $_POST['office_expenses'], $_POST['burdened_rate'], $_POST['fblr'], $_POST['hours_project'], $_POST['total_burdened_rate'], $_POST['total_fblr']);
  StaffRepository::insert_staff(Connection::get_connection(), $staff);
  Connection::close_connection();
  Redirection::redirect(INFO_PROJECT_AND_SERVICES . $id_project . '#staff');
}
?>
