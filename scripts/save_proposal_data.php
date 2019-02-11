<?php
session_start();
if(isset($_POST['save_proposal_data'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
  $services = ServiceRepository::get_services_by_id_project(Connection::get_connection(), $id_project);
  foreach ($services as $i => $service) {
    ServiceRepository::set_info_proposal(Connection::get_connection(), $_POST['proposal_description' . $service-> get_id()], $_POST['proposal_quantity' . $service-> get_id()], $service-> get_id());
  }
  Connection::close_connection();
  Redirection::redirect(MAKE_PROPOSAL . $id_project);
}
?>
