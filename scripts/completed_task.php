<?php
session_start();
Connection::open_connection();
$task = TaskRepository::get_task_by_id(Connection::get_connection(), $id_task);
$author_user = UserRepository::get_user_by_id(Connection::get_connection(), $task-> get_id_user());
$designated_user = UserRepository::get_user_by_id(Connection::get_connection(), $task-> get_designated_user());
TaskRepository::set_completed_task(Connection::get_connection(), $id_task);
Connection::close_connection();

$to = $author_user-> get_email();
$subject = $project-> get_project_name();
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: " . $_SESSION['username'] . " E-logic <elogic@e-logic.us>\r\n";
$message = '
<html>
<body>
<h3>Completed task!</h3>
<h4>Description:</h4>
<p>' . nl2br($_POST['task_description']) . '</p>
</body>
</html>
';
mail($to, $subject, $message, $headers);

Redirection::redirect(CALENDAR_MY_TASKS);
?>
