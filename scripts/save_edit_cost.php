<?php
session_start();
if(isset($_POST['save_edit_cost'])){
  Connection::open_connection();
  $cost = CostRepository::get_cost_by_id(Connection::get_connection(), $_POST['id_cost']);
  $service = ServiceRepository::get_service_by_id(Connection::get_connection(), $cost-> get_id_service());
  CostRepository::edit_cost(Connection::get_connection(), $_POST['description'], $_POST['amount'], $_POST['id_cost']);
  Connection::close_connection();
  Redirection::redirect(SERVICE . $service-> get_id());
}
?>
