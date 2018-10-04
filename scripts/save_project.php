<?php
session_start();
if(isset($_POST['save_project'])){
  if(!empty($_POST['members'])){
    $members = implode('|', $_POST['members']);
  }
  Connection::open_connection();
  $array_id_users = [];
  foreach ($_POST['members'] as $id_user_member) {
    $user_member = UserRepository::get_user_by_id(Connection::get_connection(), $id_user_member);
    if($user_member-> get_level() == 3 || $user_member-> get_level() == 4){
      $array_id_users[] = $id_user_member;
    }
  }
  $designated_user_index = array_rand($array_id_users);
  $designated_user = $array_id_users[$designated_user_index];
  $user = UserRepository::get_user_by_id(Connection::get_connection(), $designated_user);
  $project = new Project('', $_SESSION['id_user'], '', '', $_POST['link'], '', '', '', '', '', '', 0, $designated_user, 0, '', '', '', 0, '', 0, 0, 0, '', '', 1,'', '', '', '', '', '', '', '', '', 0, $members);
  $id_project = ProjectRepository::insert_project(Connection::get_connection(), $project);
  $service = New Service('', $id_project, 0, 0);
  ServiceRepository::insert_service(Connection::get_connection(), $service);
  if(!empty($_POST['create_part_comments'])){
    $comment = new Comment('', $id_project, $_SESSION['id_user'], '', htmlspecialchars($_POST['create_part_comments']));
    CommentRepository::insert_comment(Connection::get_connection(), $comment);
  }
  Connection::close_connection();
  $to = $user-> get_email();
  $subject = "RFP system";
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";
  $headers .= "From: " . $_SESSION['username'] . " E-logic <elogic@e-logic.us>\r\n";
  $message = '
  <html>
  <body>
  <h3>New project:</h3>
  <p>' . nl2br($_POST['create_part_comments']) . '</p>
  <h3>Link:</h3>
  <p><a href="http://www.elogicportal.com/rfp/profile/calendar_new_projects">E-logic portal</a></p>
  </body>
  </html>
  ';
  mail($to, $subject, $message, $headers);

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
