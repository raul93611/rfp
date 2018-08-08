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

  ConnectionRfq::open_connection();
  $users_rfq = UserRepositoryRfq::get_users(ConnectionRfq::get_connection());
  ConnectionRfq::close_connection();
  foreach ($users_rfq as $user_rfq) {
    $id_users_rfq[] = $user_rfq-> get_id();
  }
  $designated_user_index = array_rand($id_users_rfq);
  $designated_user = $id_users_rfq[$designated_user_index];
  $quote = new Quote('', $id_project, $designated_user, '', '', 0, 0, '', '', '', '', '', 0, 0, '', 0, '');
  Connection::open_connection();
  QuoteRepository::insert_quote(Connection::get_connection(), $quote);
  ProjectRepository::fill_out_project(Connection::get_connection(), $_POST['id_project'], $_POST['project_name'], $start_date, $end_date, $_POST['priority'], htmlspecialchars($_POST['description']), $_POST['way'], $_POST['type'], $priority_color);
  Connection::close_connection();
  Redirection::redirect1(FLOWCHART . $id_project);
}
?>
