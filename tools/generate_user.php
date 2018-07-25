<?php
Connection::open_connection();
$username = 'raul93611';
$password = password_hash('elogic93611', PASSWORD_DEFAULT);
$names = 'leonardo';
$last_names = 'velasco';
$level = 1;
$email = 'asdsadas@asdads';
$user = new User('', $username, $password, $names, $last_names, $level, $email);
UserRepository::insert_user(Connection::get_connection(), $user);
Connection::close_connection();
?>
