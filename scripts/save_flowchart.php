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
ProjectRepository::save_flowchart_and_flowchart_comments(Connection::get_connection(), $_POST['flowchart_result'], htmlspecialchars($_POST['project_comments']), $priority_color, $_POST['id_project']);
Connection::close_connection();
Redirection::redirect1(PROFILE . 'calendar_projects');
?>
