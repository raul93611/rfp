<?php
session_start();
if(isset($_POST['save_project'])){
  $project_date = $_POST['project_date'];
  $parts_project_date = explode('/', $project_date);
  $project_date = $parts_project_date[2] . '-' . $parts_project_date[0] . '-' . $parts_project_date[1];
  $project_date = strtotime($project_date);
  $project_date = date('Y-m-d', $project_date);
  $project = new Project('', $_SESSION['id_user'], $project_date, $_POST['link']);
  Connection::open_connection();
  ProjectRepository::insert_project(Connection::get_connection(), $project);
  Connection::close_connection();
  Redirection::redirect1(PROFILE);
}
?>
