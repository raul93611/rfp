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
  $project = new Project('', $_SESSION['id_user'], '', '', $_POST['link'], '', '', '', '', '', '', 0, $designated_user, 0, '', '', '', 0, '', 0, 0, 0, '', '', 1,'', '', '', '', '', '', 0);
  $id_project = ProjectRepository::insert_project(Connection::get_connection(), $project);
  $service = New Service('', $id_project, 0, 0);
  ServiceRepository::insert_service(Connection::get_connection(), $service);
  if(!empty($_POST['create_part_comments'])){
    $comment = new Comment('', $id_project, $_SESSION['id_user'], '', htmlspecialchars($_POST['create_part_comments']));
    CommentRepository::insert_comment(Connection::get_connection(), $comment);
  }
  Connection::close_connection();
  
  $directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
  mkdir($directory, 0777);
  $documents = array_filter($_FILES['documents']['name']);
  $total = count($documents);
  for ($i = 0; $i < $total; $i++) {
      $tmp_path = $_FILES['documents']['tmp_name'][$i];
      $file = $_FILES['documents']['name'][$i];
      if ($tmp_path != '') {
        $file = preg_replace('/[^a-z0-9-_\-\.]/i','_',$file);
        $new_path = $directory . '/' . $file;
        move_uploaded_file($tmp_path, $new_path);
      }
  }
  Redirection::redirect(CALENDAR_NEW_PROJECTS);
}
?>
