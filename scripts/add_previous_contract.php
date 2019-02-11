<?php
session_start();
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
$previous_contract = new Project('', $_SESSION['id_user'], '', $project-> get_code(), $project-> get_link(), $project-> get_project_name(), '', '', '', '', '', 0, $project-> get_designated_user(), 0, '', '', '', 0, '', 0, 0, 0, '', '', '', '', '', 0, 0, $project-> get_members(), $project-> get_id());
$id_previous_contract = ProjectRepository::insert_project(Connection::get_connection(), $previous_contract);
$service = new Service('', $id_previous_contract, 0, '', 0);
ServiceRepository::insert_service(Connection::get_connection(), $service);
Connection::close_connection();

$directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_previous_contract;
mkdir($directory, 0777);
Redirection::redirect(INFO_PROJECT . $id_previous_contract);
?>
