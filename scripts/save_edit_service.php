<?php
session_start();
if(isset($_POST['save_edit_service'])){
  Connection::open_connection();
  $service = ServiceRepository::get_service_by_id(Connection::get_connection(), $_POST['id_service']);
  ServiceRepository::set_total(Connection::get_connection(), $_POST['total_service'], $_POST['id_service']);
  Connection::close_connection();
  Redirection::redirect(INFO_PROJECT_AND_SERVICES . $service-> get_id_project() . '#services');
}
?>
