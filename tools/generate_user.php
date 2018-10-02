<?php
Connection::open_connection();
$connection = Connection::get_connection();
$sql = 'UPDATE projects SET id = 50000 WHERE id = 1';
$sentence = $connection-> prepare($sql);
$sentence-> execute();
/*
$username = 'raul93611';
$password = password_hash('elogic93611', PASSWORD_DEFAULT);
$names = 'leonardo';
$last_names = 'velasco';
$level = 1;
$email = 'lvelasco@e-logic.us';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pepe1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'jose';
$last_names = 'salazar';
$level = 2;
$email = 'jose@salazar';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pedro1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'pedro';
$last_names = 'palacios';
$level = 3;
$email = 'pedro@palacios';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pablo1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'pablo';
$last_names = 'ramirez';
$level = 4;
$email = 'pablo@ramirez';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);
*/
Connection::close_connection();
?>
