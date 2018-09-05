<?php
session_start();
if(isset($_POST['save_proposal_data2'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
  $staff = StaffRepository::get_all_staff_by_id_service(Connection::get_connection(), $service-> get_id());
  $proposal_description2 = [];
  $proposal_quantity2 = [];
  $proposal_amount2 = [];
  for ($i = 1; $i <= count($staff); $i++) {
    $proposal_description2[] = $_POST['proposal_description' . $i];
    $proposal_quantity2[] = $_POST['proposal_quantity' . $i];
    $proposal_amount2[] = $_POST['proposal_amount' . $i];
  }
  $proposal_description2 = implode('|', $proposal_description2);
  $proposal_quantity2 = implode('|', $proposal_quantity2);
  $proposal_amount2 = implode('|', $proposal_amount2);
  ProjectRepository::set_proposal_data2(Connection::get_connection(), $proposal_description2, $proposal_quantity2, $proposal_amount2, $id_project);
  Connection::close_connection();
  Redirection::redirect(MAKE_PROPOSAL2 . $id_project);
}
?>
