<?php
session_start();
if(isset($_POST['save_proposal_data2'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
  $staff = StaffRepository::get_all_staff_by_id_service(Connection::get_connection(), $service-> get_id());
  $proposal_description = [];
  $proposal_quantity = [];
  $proposal_amount = [];
  for ($i = 1; $i <= count($staff); $i++) {
    $proposal_description[] = $_POST['proposal_description' . $i];
    $proposal_quantity[] = $_POST['proposal_quantity' . $i];
    $proposal_amount[] = $_POST['proposal_amount' . $i];
  }
  $proposal_description = implode('|', $proposal_description);
  $proposal_quantity = implode('|', $proposal_quantity);
  $proposal_amount = implode('|', $proposal_amount);
  ProjectRepository::set_proposal_data(Connection::get_connection(), $proposal_description, $proposal_quantity, $proposal_amount, $id_project);
  Connection::close_connection();
  Redirection::redirect(MAKE_PROPOSAL2 . $id_project);
}
?>
