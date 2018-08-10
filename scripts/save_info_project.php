<?php
session_start();
if(isset($_POST['save_changes_project'])){
  $start_date = ProjectRepository::english_format_to_mysql_date($_POST['start_date']);
  $end_date = ProjectRepository::english_format_to_mysql_datetime($_POST['end_date']);

  if($_POST['way'] == 'mail'){
    $end_date = date('Y-m-d', strtotime($end_date . '-5 days'));
  }

  switch ($_POST['priority']) {
    case '8a':
      $priority_color = '#f75a6a';
      break;
    case 'hubzone':
      $priority_color = '#f8d200';
      break;
    case 'small_business':
      $priority_color = '#0cd63f';
      break;
    case 'full_and_open';
      $priority_color = '#f441be';
      break;
    default:
      break;
  }
  if($_POST['type'] == 'services_and_equipment'){
    ConnectionRfq::open_connection();
    $rfq_users = RepositorioUsuario::obtener_usuarios_rfq(ConnectionRfq::get_connection());
    foreach ($rfq_users as $rfq_user) {
      $id_rfq_users[] = $rfq_user-> obtener_id();
    }
    $designated_user_index = array_rand($id_rfq_users);
    $designated_user = $id_rfq_users[$designated_user_index];
    echo $designated_user;
    $quote_rfq = New Rfq('', $designated_user, $designated_user, '', '', '', $start_date, $end_date, 0, 0, 0, 0, '', 0, '', '', '', '', '', '', '', '', 0, 0, '', '', 0);
    list($cotizacion_insertada, $id_rfq) = RepositorioRfq::insertar_cotizacion(ConnectionRfq::get_connection(), $quote_rfq);
    $rfp_connection = New RfpConnection('', $id_rfq, $_POST['id_project']);
    RepositorioRfpConnection::insertar_rfp_connection(ConnectionRfq::get_connection(), $rfp_connection);
    ConnectionRfq::close_connection();
    Connection::open_connection();
    $service = New Service('', $_POST['id_project'], 0);
    ServiceRepository::insert_service(Connection::get_connection(), $service);
    Connection::close_connection();
  }else if($_POST['type'] == 'services'){
    Connection::open_connection();
    $service = New Service('', $_POST['id_project'], 0);
    ServiceRepository::insert_service(Connection::get_connection(), $service);
    Connection::close_connection();
  }
  Connection::open_connection();
  ProjectRepository::fill_out_project(Connection::get_connection(), $_POST['id_project'], $_POST['project_name'], $start_date, $end_date, $_POST['priority'], htmlspecialchars($_POST['description']), $_POST['way'], $_POST['type'], $priority_color);
  Connection::close_connection();
  Redirection::redirect1(FLOWCHART . $id_project);
}
?>
