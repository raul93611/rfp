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
  $project = new Project('', $_SESSION['id_user'], '', '', $_POST['link'], '', '', '', '', '', '', '', 0, $designated_user, 0, '', htmlspecialchars($_POST['create_part_comments']));
  $id_project = ProjectRepository::insert_project(Connection::get_connection(), $project);
  Connection::close_connection();

  $directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
  mkdir($directory, 0777);
  $documents = array_filter($_FILES['documents']['name']);
  $total = count($documents);
  for ($i = 0; $i < $total; $i++) {
      $tmp_path = $_FILES['documents']['tmp_name'][$i];

      if ($tmp_path != '') {
          $new_path = $directory . '/' . $_FILES['documents']['name'][$i];
          move_uploaded_file($tmp_path, $new_path);
      }
  }

  Redirection::redirect1(PROFILE);
}
?>
