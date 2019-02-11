<?php
if(isset($_POST['send'])){
  $error = false;
  if(isset($_POST['password1']) && !empty($_POST['password1']) && isset($_POST['password2']) && !empty($_POST['password2'])){
    if($_POST['password1'] == $_POST['password2']){
      $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
      Connection::open_connection();
      $hash_exists = UserRepository::hash_exists(Connection::get_connection(), $_POST['hash']);
      if($hash_exists){
        $user = UserRepository::get_user_by_hash(Connection::get_connection(), $_POST['hash']);
        UserRepository::update_password(Connection::get_connection(), $password, $user-> get_id());
        UserRepository::remove_hash(Connection::get_connection(), $user-> get_id());
      }else {
        $error = true;
      }
      Connection::close_connection();
    }else{
      $error = true;
    }
  }else{
    $error = true;
  }
}
?>
