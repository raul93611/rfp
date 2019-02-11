<?php
session_start();
if(isset($_POST['send_error_quote_email'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $_POST['id_project']);
  Connection::close_connection();
  Conexion::abrir_conexion();
  $rfq_quote = RepositorioRfq::obtener_cotizacion_por_id_project(Conexion::obtener_conexion(), $_POST['id_project']);
  $designated_user_rfq_quote = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $rfq_quote-> obtener_usuario_designado());
  RepositorioRfq::quitar_checks(Conexion::obtener_conexion(), $rfq_quote-> obtener_id());
  Conexion::cerrar_conexion();

  $to = $designated_user_rfq_quote-> obtener_email();
  $subject = "Proposal: " . $rfq_quote-> obtener_id();
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";
  $headers .= "From: " . $_SESSION['username'] . " E-logic <elogic@e-logic.us>\r\n";
  $message = '
  <html>
  <body>
  <h3>Link:</h3>
  <p><a href="http://www.elogicportal.com/rfq/perfil/cotizaciones/editar_cotizacion/' . $rfq_quote-> obtener_id() . '">E-logic portal</a></p>
  <h3>Comment:</h3>
  <p>' . nl2br($_POST['comments_error_quote_email']) . '</p>
  </body>
  </html>
  ';
  mail($to, $subject, $message, $headers);

  Redirection::redirect(INFO_PROJECT_AND_SERVICES . $_POST['id_project'] . '#items');
}
?>
