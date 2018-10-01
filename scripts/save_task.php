<?php
session_start();
if(isset($_POST['save_task'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $_POST['id_project']);
  $end_date = ProjectRepository::english_format_to_mysql_date($_POST['end_date_task']);
  $task = new Task('', $_POST['id_project'], $_SESSION['id_user'], $_POST['designated_user_task'], $end_date, $_POST['task_description'], 0);
  $author_user = UserRepository::get_user_by_id(Connection::get_connection(), $_SESSION['id_user']);
  $designated_user = UserRepository::get_user_by_id(Connection::get_connection(), $_POST['designated_user_task']);
  TaskRepository::insert_task(Connection::get_connection(), $task);
  Connection::close_connection();

  $to = $designated_user-> get_email();
  $subject = "System RFP";
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";
  $message = '
  <html>
  <body>
  <h1>' . $project-> get_project_name() .'</h1>
  <p><i>' . $_POST['task_description'] . '</i>
  <br>created by: ' . $author_user-> get_username() . '
  </p>
  </body>
  </html>
  ';
  mail($to, $subject, $message, $headers);

  Redirection::redirect(INFO_PROJECT_AND_SERVICES . $_POST['id_project']);
}
?>
