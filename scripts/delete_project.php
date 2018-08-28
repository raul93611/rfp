<?php
session_start();
Connection::open_connection();
ProjectRepository::delete_project(Connection::get_connection(), $id_project);
Connection::close_connection();
Redirection::redirect(CALENDAR_NEW_PROJECTS);
?>
