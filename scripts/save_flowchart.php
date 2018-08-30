<?php
session_start();
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(),$_POST['id_project']);
Connection::close_connection();
if(!$_POST['flowchart_result']){
  $priority_color = 'black';
}else{
  $priority_color = $project-> get_priority_color();
}
Connection::open_connection();
ProjectRepository::save_flowchart(Connection::get_connection(), $_POST['flowchart_result'], $priority_color, $_POST['id_project']);
if(!empty($_POST['project_comments'])){
  $comment = new Comment('', $_POST['id_project'], $_SESSION['id_user'], '', htmlspecialchars($_POST['project_comments']));
  CommentRepository::insert_comment(Connection::get_connection(), $comment);
}
Connection::close_connection();
Redirection::redirect(PROFILE . 'calendar_projects');
?>
