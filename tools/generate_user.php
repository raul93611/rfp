<?php
Connection::open_connection();
$username = 'raul93611';
$password = password_hash('elogic93611', PASSWORD_DEFAULT);
$names = 'leonardo';
$last_names = 'velasco';
$level = 1;
$email = 'lvelasco@e-logic.us';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);
?>
