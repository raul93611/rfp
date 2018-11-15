<?php
session_start();
if(isset($_POST['save_edit_staff'])){
  Connection::open_connection();
  $single_staff = StaffRepository::get_staff_by_id(Connection::get_connection(), $_POST['id_staff']);
  $service = ServiceRepository::get_service_by_id(Connection::get_connection(), $single_staff-> get_id_service());
  StaffRepository::edit_single_staff(Connection::get_connection(), $_POST['name'], $_POST['hourly_rate'], $_POST['rate'], $_POST['office_expenses'], $_POST['burdened_rate'], $_POST['fblr'], $_POST['hours_project'], $_POST['total_burdened_rate'], $_POST['total_fblr'], $_POST['id_staff']);
  Connection::close_connection();
  Redirection::redirect(SERVICE . $service-> get_id());
}
?>
