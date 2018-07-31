<?php
session_start();
if(isset($_POST['save_changes_project'])){
  $start_date = ProjectRepository::english_format_to_mysql_date($_POST['start_date']);
  $end_date = ProjectRepository::english_format_to_mysql_datetime($_POST['end_date']);
  Connection::open_connection();
  ProjectRepository::fill_out_project(Connection::get_connection(), $_POST['id_project'], $_POST['project_name'], $start_date, $end_date, $_POST['priority'], htmlspecialchars($_POST['description']), $_POST['way'], $_POST['type']);
  Connection::close_connection();
  Redirection::redirect1(FLOWCHART . $id_project);
}
?>
