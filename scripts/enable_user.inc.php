<?php
session_start();
Connection::open_connection();
$edited_user = UserRepository::enable_user(Connection::get_connection(), $id_user);
Connection::close_connection();
if($edited_user){
  Redirection::redirect(PROFILE);
}
?>
