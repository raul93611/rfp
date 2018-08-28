<?php
if(isset($_POST['save_cost'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $_POST['id_project']);
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $project-> get_id());
  $cost = new Cost('', $service-> get_id(), $_POST['description'], $_POST['amount']);
  CostRepository::insert_cost(Connection::get_connection(), $cost);
  Connection::close_connection();
  Redirection::redirect(INFO_PROJECT_AND_SERVICES . $id_project . '#costs');
}
?>
