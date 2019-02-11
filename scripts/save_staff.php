<?php
if(isset($_POST['save_staff'])){
  Connection::open_connection();
  $staff = new Staff('', $_POST['id_service'], $_POST['name'], $_POST['hourly_rate'], $_POST['rate'], $_POST['office_expenses'], $_POST['burdened_rate'], $_POST['fblr'], $_POST['hours_project'], $_POST['total_burdened_rate'], $_POST['total_fblr'], '', 0, 0);
  StaffRepository::insert_staff(Connection::get_connection(), $staff);
  Connection::close_connection();
  Redirection::redirect(SERVICE . $_POST['id_service']);
}
?>
