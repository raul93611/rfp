<?php
session_start();
if(isset($_POST['send_error_quote_email'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $_POST['id_project']);
  Connection::close_connection();
  Conexion::abrir_conexion();
  $rfp_connection = RepositorioRfpConnection::obtener_rfp_connection_por_id_project(Conexion::obtener_conexion(), $_POST['id_project']);
  $rfq_quote = RepositorioRfq::obtener_cotizacion_por_id(Conexion::obtener_conexion(), $rfp_connection-> obtener_id_rfq());
  $designated_user_rfq_quote = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $rfq_quote-> obtener_usuario_designado());
  RepositorioRfq::quitar_completado(Conexion::obtener_conexion(), $rfp_connection-> obtener_id_rfq());
  Conexion::cerrar_conexion();
  /*
  $to = $designated_user_rfq_quote-> obtener_email();
  $subject = "Sistema RFP";
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";
  $message = '
  <html>
  <body>
  <h1>RFP Quote Proposal: ' . $rfp_quote-> obtener_id() . '</h1>
  <p>' . $_POST['comments_error_quote_email'] . '</p>
  </body>
  </html>
  ';
  mail($to, $subject, $message, $headers);
  */
  Redirection::redirect1(INFO_PROJECT_AND_SERVICES . $_POST['id_project']);
}
?>
