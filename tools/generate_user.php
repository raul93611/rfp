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

$username = 'pedro1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'pedro';
$last_names = 'perez';
$level = 2;
$email = 'pedro@perez';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pablo1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'pablo';
$last_names = 'terrazas';
$level = 3;
$email = 'pablo@terrazas';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pepe1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'jose';
$last_names = 'valverde';
$level = 4;
$email = 'jose@valverde';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'peter1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'peter';
$last_names = 'calle';
$level = 5;
$email = 'peter@calle';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'Laura';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'laura';
$last_names = 'villafan';
$level = 2;
$email = 'lvillafan@e-logic.us';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);
Connection::close_connection();
?>
