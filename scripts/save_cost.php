<?php
if(isset($_POST['save_cost'])){
  Connection::open_connection();
  $cost = new Cost('', $_POST['id_service'], $_POST['description'], $_POST['amount']);
  CostRepository::insert_cost(Connection::get_connection(), $cost);
  Connection::close_connection();
  Redirection::redirect(SERVICE . $_POST['id_service']);
}
?>
