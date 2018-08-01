<?php
session_start();
if(isset($_POST['save_project'])){
  Connection::open_connection();
  $users = UserRepository::get_users_3_4(Connection::get_connection());
  $array_id_users = [];
  foreach ($users as $user) {
    $array_id_users[] = $user-> get_id();
  }
  $designated_user_index = array_rand($array_id_users);
  $designated_user = $array_id_users[$designated_user_index];
  $project = new Project('', $_SESSION['id_user'], '', $_POST['link'], '', '', '', '', '', '', '', '', 0, $designated_user);
  ProjectRepository::insert_project(Connection::get_connection(), $project);
  Connection::close_connection();
  Redirection::redirect1(PROFILE);
}
?>
