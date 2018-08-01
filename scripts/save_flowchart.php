<?php
session_start();
Connection::open_connection();
ProjectRepository::save_flowchart_and_comments(Connection::get_connection(), $_POST['flowchart_result'], htmlspecialchars($_POST['project_comments']), $_POST['id_project']);
Connection::close_connection();
Redirection::redirect1(PROFILE);
?>
