<?php
session_start();
if(isset($_POST['save_changes_project'])){
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $_POST['id_project']);
  Connection::close_connection();
  if($_POST['designated_user'] != $project-> get_designated_user()){
    Connection::open_connection();
    ProjectRepository::change_designated_user(Connection::get_connection(), $_POST['designated_user'], $_POST['id_project']);
    Connection::close_connection();
    Redirection::redirect(CALENDAR_NEW_PROJECTS);
  }
  $end_date = ProjectRepository::english_format_to_mysql_datetime($_POST['end_date']);

  switch ($_POST['priority']) {
    case '8a':
      $priority_color = '#FF5253';
      break;
    case 'hubzone':
      $priority_color = '#FFD73F';
      break;
    case 'small_business':
      $priority_color = '#18D2F0';
      break;
    case 'full_and_open':
      $priority_color = '#BE90E3';
      break;
    case 'sources_sought':
      $priority_color = '#448AFF';
      break;
    default:
      break;
  }
  if($_POST['type'] == 'services_and_equipment'){
    Conexion::abrir_conexion();
    $quote_rfq_exists = RepositorioRfq::quote_rfq_exists(Conexion::obtener_conexion(), $_POST['id_project']);
    if(!$quote_rfq_exists){
      $quote_rfq = New Rfq('', $_POST['designated_user_rfq'], $_POST['designated_user_rfq'], '', $_POST['code'], '', $_POST['start_date'], $_POST['end_date'], 0, 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', 0, 0, '', '', 0, $id_project, 0);
      list($cotizacion_insertada, $id_rfq) = RepositorioRfq::insertar_cotizacion(Conexion::obtener_conexion(), $quote_rfq);
      if($cotizacion_insertada){
        $cuestionario = new Cuestionario('', $id_rfq, '', '', '', '', '', '', '', '', '');
        RepositorioCuestionario::insertar_cuestionario(Conexion::obtener_conexion(), $cuestionario);
      }
      $rfq_directory = $_SERVER['DOCUMENT_ROOT'] . '/rfq/documentos/' . $id_rfq;
      $rfp_directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
      mkdir($rfq_directory, 0777);
      if(is_dir($rfp_directory)){
        $manager = opendir($rfp_directory);
        $folder = @scandir($rfp_directory);
        while(($file = readdir($manager)) !== false){
          if($file != '.' && $file != '..'){
            copy($rfp_directory . '/' . $file, $rfq_directory . '/' . $file);
          }
        }
        closedir($manager);
      }
      $designated_user_object = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $_POST['designated_user_rfq']);
      $to = $designated_user_object-> obtener_email();
      $subject = "Proposal: " . $id_rfq;
      $headers = "MIME-Version: 1.0\r\n";
      $headers .= "Content-type: text/html; charset=UTF-8\r\n";
      $headers .= "From: " . $_SESSION['username'] . " E-logic <elogic@e-logic.us>\r\n";
      $message = '
      <html>
      <body>
      <h3>Link:</h3>
      <p><a href="http://www.elogicportal.com/rfq/perfil/cotizaciones/rfp_quotes">E-logic portal</a></p>
      <h3>Comment:</h3>
      <p>RFP Team created a new quote.</p>
      </body>
      </html>
      ';
      mail($to, $subject, $message, $headers);
    }
    Conexion::cerrar_conexion();

  }
  Connection::open_connection();
  ProjectRepository::fill_out_project(Connection::get_connection(), $_POST['id_project'], $_POST['code'], $_POST['project_name'], $end_date, $_POST['priority'], htmlspecialchars($_POST['description']), $_POST['submission_instructions'], $_POST['type'], $priority_color, $_POST['subject'], $_POST['business_type']);
  Connection::close_connection();
  Redirection::redirect(FLOWCHART . $id_project);
}
?>
