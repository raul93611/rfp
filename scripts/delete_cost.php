<?php
session_start();
Connection::open_connection();
$cost = CostRepository::get_cost_by_id(Connection::get_connection(), $id_cost);
$service = ServiceRepository::get_service_by_id(Connection::get_connection(), $cost-> get_id_service());
CostRepository::delete_cost(Connection::get_connection(), $id_cost);
Connection::close_connection();
Redirection::redirect(INFO_PROJECT_AND_SERVICES . $service-> get_id_project() . '#costs');
?>
