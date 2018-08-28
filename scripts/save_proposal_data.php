<?php
session_start();
if(isset($_POST['save_proposal_data'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
  $quantity_years = $project-> get_quantity_years();
  $proposal_description = [];
  $proposal_quantity = [];
  for ($i = 1; $i <= $quantity_years; $i++) {
    $proposal_description[] = $_POST['proposal_description' . $i];
    $proposal_quantity[] = $_POST['proposal_quantity' . $i];
  }
  $proposal_description = implode('|', $proposal_description);
  $proposal_quantity = implode('|', $proposal_quantity);
  ProjectRepository::set_proposal_data(Connection::get_connection(), $proposal_description, $proposal_quantity, $id_project);
  Connection::close_connection();
  Redirection::redirect(MAKE_PROPOSAL . $id_project);
}
?>
