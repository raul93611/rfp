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
    $rfq_users = RepositorioUsuario::obtener_usuarios_rfq(Conexion::obtener_conexion());
    foreach ($rfq_users as $rfq_user) {
      $id_rfq_users[] = $rfq_user-> obtener_id();
    }
    $designated_user_index = array_rand($id_rfq_users);
    $designated_user = $id_rfq_users[$designated_user_index];
    $quote_rfq_exists = RepositorioRfq::quote_rfq_exists(Conexion::obtener_conexion(), $_POST['id_project']);
    if(!$quote_rfq_exists){
      $quote_rfq = New Rfq('', $designated_user, $designated_user, '', '(Detail the code ...)', '', $_POST['start_date'], $_POST['end_date'], 0, 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', 0, 0, '', '', 0, $id_project);
      list($cotizacion_insertada, $id_rfq) = RepositorioRfq::insertar_cotizacion(Conexion::obtener_conexion(), $quote_rfq);
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
    }
    Conexion::cerrar_conexion();
  }
  Connection::open_connection();
  ProjectRepository::fill_out_project(Connection::get_connection(), $_POST['id_project'], $_POST['code'], $_POST['project_name'], $end_date, $_POST['priority'], htmlspecialchars($_POST['description']), $_POST['submission_instructions'], $_POST['type'], $priority_color, $_POST['subject'], $_POST['business_type'], $_POST['quantity_years']);
  Connection::close_connection();
  Redirection::redirect(FLOWCHART . $id_project);
}
?>
