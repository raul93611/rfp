<?php
session_start();
Connection::open_connection();
$service_1 = ServiceRepository::get_first_service_by_id_project(Connection::get_connection(), $id_project);
$staff_1 = StaffRepository::get_all_staff_by_id_service(Connection::get_connection(), $service_1-> get_id());
$costs_1 = CostRepository::get_all_costs_by_id_service(Connection::get_connection(), $service_1-> get_id());
$service = new Service('', $id_project, $service_1-> get_total(), $service_1-> get_description(), $service_1-> get_quantity());
$id_service = ServiceRepository::insert_service(Connection::get_connection(), $service);
if(count($staff_1)){
  foreach ($staff_1 as $single_staff_1) {
    $staff = new Staff('', $id_service, $single_staff_1-> get_name(), $single_staff_1-> get_hourly_rate(), $single_staff_1-> get_rate(), $single_staff_1-> get_office_expenses(), $single_staff_1-> get_burdened_rate(), $single_staff_1-> get_fblr(), $single_staff_1-> get_hours_project(), $single_staff_1-> get_total_burdened_rate(), $single_staff_1-> get_total_fblr(), $single_staff_1-> get_description(), $single_staff_1-> get_quantity(), $single_staff_1-> get_amount_proposal());
    StaffRepository::insert_staff(Connection::get_connection(), $staff);
  }
}
if(count($costs_1)){
  foreach ($costs_1 as $cost_1) {
    $cost = new Cost('', $id_service, $cost_1-> get_description(), $cost_1-> get_amount());
    CostRepository::insert_cost(Connection::get_connection(), $cost);
  }
}
Connection::close_connection();
Redirection::redirect(INFO_PROJECT_AND_SERVICES . $id_project . '#services');
?>
