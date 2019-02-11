<?php
session_start();
Connection::open_connection();
$service = ServiceRepository::get_service_by_id(Connection::get_connection(), $id_service);
StaffRepository::delete_all_staff(Connection::get_connection(), $id_service);
CostRepository::delete_all_costs(Connection::get_connection(), $id_service);
ServiceRepository::delete_service(Connection::get_connection(), $id_service);
Connection::close_connection();
Redirection::redirect(INFO_PROJECT_AND_SERVICES . $service-> get_id_project());
?>
