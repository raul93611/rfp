<?php
session_start();
if(isset($_POST['save_info_project_and_services'])){
  $directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
  $documents = array_filter($_FILES['documents']['name']);
  $total = count($documents);
  for ($i = 0; $i < $total; $i++) {
      $tmp_path = $_FILES['documents']['tmp_name'][$i];
      if ($tmp_path != '') {
          $new_path = $directory . '/' . $_FILES['documents']['name'][$i];
          move_uploaded_file($tmp_path, $new_path);
      }
  }
  Connection::open_connection();
  $project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
  ServiceRepository::set_total_service(Connection::get_connection(), $_POST['total_service'], $service-> get_id());
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
    case 'full_and_open';
      $priority_color = '#f441be';
      break;
    default:
      break;
  }
  $end_date = ProjectRepository::english_format_to_mysql_datetime($_POST['end_date']);
  ProjectRepository::change_main_information_project(Connection::get_connection(), $_POST['code'], $_POST['project_name'], $_POST['business_type'], $end_date, $_POST['quantity_years'], $_POST['priority'], $priority_color, $_POST['submission_instructions'], $_POST['type'], $_POST['subject'], $_POST['description'], $id_project);
  if(!empty($_POST['story_comments'])){
    $comment = new Comment('', $id_project, $_SESSION['id_user'], '', htmlspecialchars($_POST['story_comments']));
    CommentRepository::insert_comment(Connection::get_connection(), $comment);
  }

  if($project-> get_submitted()){
    ProjectRepository::set_result_proposed_price(Connection::get_connection(), $_POST['result'], $_POST['proposed_price'], $id_project);
  }

  if(!$project-> get_submitted()){
    if(isset($_POST['submitted']) && $_POST['submitted'] == 'yes'){
      ProjectRepository::set_submitted_state(Connection::get_connection(), $id_project);
    }
  }else if(!$project-> get_award()){
    if(isset($_POST['award']) && $_POST['award'] == 'yes'){
      ProjectRepository::set_award_state(Connection::get_connection(), $id_project);
    }
  }
  Connection::close_connection();
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

  Redirection::redirect1(INFO_PROJECT_AND_SERVICES . $id_project);
}
?>
