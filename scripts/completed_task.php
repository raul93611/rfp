<?php
session_start();
Connection::open_connection();
$task = TaskRepository::get_task_by_id(Connection::get_connection(), $id_task);
$author_user = UserRepository::get_user_by_id(Connection::get_connection(), $task-> get_id_user());
$designated_user = UserRepository::get_user_by_id(Connection::get_connection(), $task-> get_designated_user());
TaskRepository::set_completed_task(Connection::get_connection(), $id_task);
Connection::close_connection();

$to = $author_user-> get_email();
$subject = "RFP system";
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: E-logic <elogic@e-logic.us>\r\n";
$message = '
<html>
<body>
<h1>' . $project-> get_project_name() .'</h1>
<p>Task: <br><i>' .
$_POST['task_description']
 . '</i><br>was completed by: '. $designated_user-> get_username() .'</p>
</body>
</html>
';
mail($to, $subject, $message, $headers);

Redirection::redirect(CALENDAR_MY_TASKS);
?>
