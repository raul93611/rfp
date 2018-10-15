<?php
session_start();
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
$service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
$staff = StaffRepository::get_all_staff_by_id_service(Connection::get_connection(), $service-> get_id());
if(count($staff)){
  StaffRepository::delete_all_staff(Connection::get_connection(), $service-> get_id());
}
$costs = CostRepository::get_all_costs_by_id_service(Connection::get_connection(), $service-> get_id());
if(count($costs)){
  CostRepository::delete_all_costs(Connection::get_connection(), $service-> get_id());
}
ServiceRepository::delete_service(Connection::get_connection(), $id_project);
$tasks = TaskRepository::get_all_tasks_by_id_project(Connection::get_connection(), $id_project);
if(count($tasks)){
  TaskRepository::delete_all_tasks(Connection::get_connection(), $id_project);
}
CommentRepository::delete_all_comments(Connection::get_connection(), $id_project);
if($project-> get_type() == 'services_and_equipment'){
  Conexion::abrir_conexion();
  $quote_rfq_exists = RepositorioRfq::quote_rfq_exists(Conexion::obtener_conexion(), $id_project);
  if($quote_rfq_exists){
    $rfq_quote = RepositorioRfq::obtener_cotizacion_por_id_project(Conexion::obtener_conexion(), $id_project);
    RepositorioRfq::establecer_id_rfp(Conexion::obtener_conexion(), 0, $rfq_quote-> obtener_id());
  }
  Conexion::cerrar_conexion();
}
ProjectRepository::delete_project(Connection::get_connection(), $id_project);
Connection::close_connection();
Redirection::redirect(CALENDAR_NEW_PROJECTS);
?>
