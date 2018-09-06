<?php
session_start();
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $_POST['id_project']);
Connection::close_connection();
if(!$_POST['flowchart_result']){
  $priority_color = 'black';
  Conexion::abrir_conexion();
  $rfp_connection = RepositorioRfpConnection::obtener_rfp_connection_por_id_project(Conexion::obtener_conexion(), $_POST['id_project']);
  RepositorioRfq::establecer_no_bid(Conexion::obtener_conexion(), $rfp_connection-> obtener_id_rfq());
  Conexion::cerrar_conexion();
}else{
  Conexion::abrir_conexion();
  $rfp_connection = RepositorioRfpConnection::obtener_rfp_connection_por_id_project(Conexion::obtener_conexion(), $_POST['id_project']);
  RepositorioRfq::establecer_no_comments(Conexion::obtener_conexion(), $rfp_connection-> obtener_id_rfq());
  Conexion::cerrar_conexion();
  $priority = $project-> get_priority();
  switch ($priority) {
    case '8a':
      $priority_color = '#f75a6a';
      break;
    case 'hubzone':
      $priority_color = '#f8d200';
      break;
    case 'small_business':
      $priority_color = '#0cd63f';
      break;
    case 'full_and_open':
      $priority_color = '#f441be';
      break;
    case 'sources_sought':
      $priority_color = '#137024';
      break;
    default:
      break;
  }
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
