<?php
session_start();
Connection::open_connection();
ServiceRepository::delete_service(Connection::get_connection(), $id_project);
CommentRepository::delete_all_comments(Connection::get_connection(), $id_project);
ProjectRepository::delete_project(Connection::get_connection(), $id_project);
Connection::close_connection();
Redirection::redirect(CALENDAR_NEW_PROJECTS);
?>
