<?php
if(isset($_POST['edit_user'])){
  switch ($_POST['level']) {
    case 'boss':
      $new_level = 2;
      break;
    case 'head_of_area':
      $new_level = 3;
      break;
    case 'common_user':
      $new_level = 4;
      break;
    case 'technician':
      $new_level = 5;
      break;
    default:
      break;
  }
  if(empty($_POST['password'])){
    $password = '';
  }else{
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  }
  Connection::open_connection();
  UserRepository::edit_user(Connection::get_connection(), $password, $_POST['username'], $_POST['names'], $_POST['last_names'], $new_level, $_POST['email'], $_POST['id_user']);
  Connection::close_connection();
  Redirection::redirect(PROFILE);
}
?>
