<?php
Connection::open_connection();
TaskRepository::set_completed_task(Connection::get_connection(), $id_task);
Connection::close_connection();
Redirection::redirect(CALENDAR_MY_TASKS);
?>
