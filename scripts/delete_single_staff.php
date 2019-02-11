<?php
session_start();
Connection::open_connection();
$single_staff = StaffRepository::get_staff_by_id(Connection::get_connection(), $id_single_staff);
$service = ServiceRepository::get_service_by_id(Connection::get_connection(), $single_staff-> get_id_service());
StaffRepository::delete_single_staff(Connection::get_connection(), $id_single_staff);
Connection::close_connection();
Redirection::redirect(INFO_PROJECT_AND_SERVICES . $service-> get_id_project() . '#staff');
?>
