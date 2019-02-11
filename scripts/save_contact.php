<?php
session_start();
if(isset($_POST['save_contact'])){
  Connection::open_connection();
  ContactListRepository::set_info_contact(Connection::get_connection(), $_POST['contact_name'], $_POST['phone'], $_POST['contact_email'], $_POST['agency'], $_POST['id_contact']);
  Connection::close_connection();
  Redirection::redirect(CONTACT_LIST);
}
?>
