<?php
Connection::open_connection();
$username = 'raul93611';
$password = password_hash('elogic93611', PASSWORD_DEFAULT);
$names = 'leonardo';
$last_names = 'velasco';
$level = 1;
$email = 'LVelasco@e-logic.us';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'andres';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'andres';
$last_names = 'rollano';
$level = 3;
$email = 'andres@rollano';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pedro1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'pedro';
$last_names = 'olivares';
$level = 2;
$email = 'pedro@olivares';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pepe1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'jose';
$last_names = 'peres';
$level = 4;
$email = 'jose@peres';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'pablo1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'pablo';
$last_names = 'cardenas';
$level = 4;
$email = 'pablo@cardenas';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'oscar1234';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'oscar';
$last_names = 'campos';
$level = 3;
$email = 'oscar@campos';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);

$username = 'Laura';
$password = password_hash('123456', PASSWORD_DEFAULT);
$names = 'laura';
$last_names = 'villafan';
$level = 2;
$email = 'laura@villafan';
$activo = 1;
$user = new User('', $username, $password, $names, $last_names, $level, $email, $activo);
UserRepository::insert_user(Connection::get_connection(), $user);
Connection::close_connection();
?>
