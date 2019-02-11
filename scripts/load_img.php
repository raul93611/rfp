<?php
session_start();
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
$user = UserRepository::get_user_by_id(Connection::get_connection(), $_SESSION['id_user']);
$members = [];
$id_members = explode('|', $project-> get_members());
foreach ($id_members as $id_member) {
  $members[] = UserRepository::get_user_by_id(Connection::get_connection(), $id_member);
}
$users = UserRepository::get_all_users_enabled(Connection::get_connection());
Connection::close_connection();
$directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
$documents = array_filter($_FILES['file_input']['name']);
$total = count($documents);
for ($i = 0; $i < $total; $i++) {
  $tmp_path = $_FILES['file_input']['tmp_name'][$i];
  $file = $_FILES['file_input']['name'][$i];
  $file = preg_replace('/[^a-z0-9-_\-\.]/i','_',$file);
  $file = explode('.', $file);
  $file_name = $file[0];
  $file_ext = $file[1];
  if ($tmp_path != '') {
    if(file_exists($directory . '/' . $file_name . '.' . $file_ext)){
      $a = 1;
      while (@file_exists($directory . '/' . $file_name . '_v' . $a . '.' . $file_ext)) {
        $a++;
      }
      $file = $file_name . '_v' . $a . '.' . $file_ext;
    }else{
      $file = $file_name . '.' . $file_ext;
    }
    $new_path = $directory . '/' . $file;
    move_uploaded_file($tmp_path, $new_path);
    foreach ($users as $user) {
      if($user-> get_level() == 2){
        $to = $user-> get_email();
        $subject = $project-> get_project_name();
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: " . $_SESSION['username'] . " <elogic@e-logic.us>\r\n";
        $message = '
        <html>
        <body>
        <h3>Project details:</h3>
        <h5>Project:</h5>
        <p><a href="' . INFO_PROJECT_AND_SERVICES . $project-> get_id() . '">' . $project-> get_project_name() . '</a></p>
        <h5>Comment:</h5>
        <p>A document was uploaded: ' . $file . '</p>
        </body>
        </html>
        ';
        mail($to, $subject, $message, $headers);
      }
    }
    foreach ($members as $member) {
      $to = $member-> get_email();
      $subject = $project-> get_project_name();
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=UTF-8\r\n";
      $headers .= "From:" .  $_SESSION['username']  . " <elogic@e-logic.us>\r\n";
      $message = '
      <html>
      <body>
      <h3>Project details:</h3>
      <h5>Project:</h5>
      <p><a href="' . INFO_PROJECT_AND_SERVICES . $project-> get_id() . '">' . $project-> get_project_name() . '</a></p>
      <h5>Comment:</h5>
      <p>A document was uploaded: ' . $file . '</p>
      </body>
      </html>
      ';
      mail($to, $subject, $message, $headers);
    }
  }
}
echo 0;
?>
