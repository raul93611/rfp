<?php
if(isset($_POST['sign_in'])){
  Connection::open_connection();
  switch ($_POST['level']){
    case 'boss':
      $level_user = 2;
      break;
    case 'head_of_area':
      $level_user = 3;
      break;
    case 'common_user':
      $level_user = 4;
      break;
    case 'technician':
      $level_user = 5;
      break;
  }
  $status = 0;
  $validator = new UserSignInValidator($_POST['username'], $_POST['password1'], $_POST['password2'], $_POST['names'], $_POST['last_names'], $_POST['email'], Connection::get_connection());

  if($validator-> valid_record()){
    $new_user = new User('', $validator-> get_username(), password_hash($validator-> get_password(), PASSWORD_DEFAULT), $validator-> get_names(), $validator-> get_last_names(), $level_user, $_POST['email'], $status);
    $inserted_user = UserRepository::insert_user(Connection::get_connection(), $new_user);
    if($inserted_user){
      Redirection::redirect1(PROFILE);
    }
  }
  Connection::close_connection();
}
?>
