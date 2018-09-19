<?php
session_start();
if(isset($_POST['save_proposal_data1'])){
  echo 'asdsadas';
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
  $staff = StaffRepository::get_all_staff_by_id_service(Connection::get_connection(), $service-> get_id());
  $proposal_description1 = [];
  $proposal_quantity1 = [];
  $proposal_amount1 = [];
  for ($i = 1; $i <= $project-> get_quantity_years(); $i++) {
    $proposal_description1[] = $_POST['proposal_description' . $i];
    $proposal_quantity1[] = $_POST['proposal_quantity' . $i];
    $proposal_amount1[] = $_POST['proposal_amount' . $i];
  }
  $proposal_description1 = implode('|', $proposal_description1);
  $proposal_quantity1 = implode('|', $proposal_quantity1);
  $proposal_amount1 = implode('|', $proposal_amount1);
  ProjectRepository::set_proposal_data1(Connection::get_connection(), $proposal_description1, $proposal_quantity1, $proposal_amount1, $id_project);
  Connection::close_connection();
  Redirection::redirect(MAKE_PROPOSAL1 . $id_project);
}
?>
