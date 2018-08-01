<?php
session_start();
if(isset($_POST['save_project'])){
  $project_date = ProjectRepository::english_format_to_mysql_date($_POST['project_date']);
  $project = new Project('', $_SESSION['id_user'], $project_date, $_POST['link'], '', '', '', '', '', '', '', '', 0);
  Connection::open_connection();
  ProjectRepository::insert_project(Connection::get_connection(), $project);
  Connection::close_connection();
  Redirection::redirect1(PROFILE);
}
?>
