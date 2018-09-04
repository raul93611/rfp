<?php
session_start();
if(isset($_POST['save_info_project_and_services']) || isset($_POST['make_proposal1']) || isset($_POST['make_proposal2'])){
  $directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
  $documents = array_filter($_FILES['documents']['name']);
  $total = count($documents);
  for ($i = 0; $i < $total; $i++) {
      $tmp_path = $_FILES['documents']['tmp_name'][$i];
      $file = $_FILES['documents']['name'][$i];
      $file = preg_replace('/[^a-z0-9-_\-\.]/i','_',$file);
      $file = explode('.', $file);
      $file_name = $file[0];
      $file_ext = $file[1];
      if ($tmp_path != '') {
        if(file_exists($directory . '/' . $file_name . '.' . $file_ext)){
          $a = 1;
          while (@file_exists($directory . '/' . $file_name . '_v' . $a . '.' . $file_ext)) {
            $a++;
          }
          $file = $file_name . '_v' . $a . '.' . $file_ext;
        }else{
          $file = $file_name . '.' . $file_ext;
        }
        $new_path = $directory . '/' . $file;
        move_uploaded_file($tmp_path, $new_path);
      }
  }
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
  ServiceRepository::set_total_service_total_equipment(Connection::get_connection(), $_POST['total_service'], $_POST['total_equipment'], $service-> get_id());
  ProjectRepository::set_proposal_amount(Connection::get_connection(), $_POST['total_by_year'], $id_project);
  ProjectRepository::set_total(Connection::get_connection(), $_POST['total'], $id_project);
  $users = UserRepository::get_all_users(Connection::get_connection());
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
    case 'full_and_open':
      $priority_color = '#f441be';
      break;
    case 'sources_sought':
      $priority_color = '#137024';
      break;
    default:
      break;
  }
  $end_date = ProjectRepository::english_format_to_mysql_datetime($_POST['end_date']);
  ProjectRepository::change_main_information_project(Connection::get_connection(), $_POST['code'], $_POST['project_name'], $_POST['business_type'], $end_date, $_POST['quantity_years'], $_POST['priority'], $priority_color, $_POST['submission_instructions'], $_POST['type'], $_POST['subject'], $_POST['address'], $_POST['ship_to'], $_POST['description'], $id_project);
  if(!empty($_POST['story_comments'])){
    $comment = new Comment('', $id_project, $_SESSION['id_user'], '', htmlspecialchars($_POST['story_comments']));
    CommentRepository::insert_comment(Connection::get_connection(), $comment);
  }

  if($project-> get_submitted()){
    $expiration_date = ProjectRepository::english_format_to_mysql_date($_POST['expiration_date']);
    ProjectRepository::set_result_proposed_price_and_expiration_date(Connection::get_connection(), $_POST['result'], $_POST['proposed_price'], $expiration_date, $id_project);
  }

  if(!$project-> get_submitted()){
    if(isset($_POST['submitted']) && $_POST['submitted'] == 'yes'){
      ProjectRepository::set_submitted_state(Connection::get_connection(), $id_project);
    }
  }elseif(!$project-> get_follow_up()){
    if(isset($_POST['follow_up']) && $_POST['follow_up'] == 'yes'){
      ProjectRepository::set_follow_up_state(Connection::get_connection(), $id_project);
    }
  }else if(!$project-> get_award()){
    if(isset($_POST['award']) && $_POST['award'] == 'yes'){
      ProjectRepository::set_award_state(Connection::get_connection(), $id_project);
    }
  }
  Connection::close_connection();
  Conexion::abrir_conexion();
  $quote_rfq_exists = RepositorioRfpConnection::quote_rfq_exists(Conexion::obtener_conexion(), $id_project);
  if($quote_rfq_exists){
    $rfp_connection = RepositorioRfpConnection::obtener_rfp_connection_por_id_project(Conexion::obtener_conexion(), $id_project);
    RepositorioRfq::actualizar_end_date(Conexion::obtener_conexion(), $_POST['end_date'], $rfp_connection-> obtener_id_rfq());
  }
  Conexion::cerrar_conexion();
  /*
  foreach ($users as $user) {
    $to = $user-> obtener_email();
    $subject = "Sistema RFP";
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $message = '
    <html>
    <body>
    <h1>' . $project-> get_project_name() .'</h1>
    <p>' . $_POST['story_comments'] . '</p>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
  }

  */
  if(isset($_POST['save_info_project_and_services'])){
    Redirection::redirect(INFO_PROJECT_AND_SERVICES . $id_project);
  }else if(isset($_POST['make_proposal1'])){
    Redirection::redirect(MAKE_PROPOSAL1 . $id_project);
  }else if(isset($_POST['make_proposal2'])){
    Redirection::redirect(MAKE_PROPOSAL2 . $id_project);
  }
}
?>
