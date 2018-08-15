<?php
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
  $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
  ServiceRepository::set_total_service(Connection::get_connection(), $_POST['total_service'], $service-> get_id());
  Connection::close_connection();

  Redirection::redirect1(INFO_PROJECT_AND_SERVICES . $id_project);
}
?>
