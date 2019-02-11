<?php
if(isset($_POST['send'])){
  function sa($longitud){
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';

    for($i = 0; $i < $longitud; $i++){
      $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
    return $string_aleatorio;
  }
  Connection::open_connection();
  $email_exists = UserRepository::email_exists(Connection::get_connection(), $_POST['email']);
  Connection::close_connection();
  if($email_exists){
    Connection::open_connection();
    $user = UserRepository::get_user_by_email(Connection::get_connection(), $_POST['email']);
    $string_random = sa(10);
    $hash = hash('sha256', $string_random . $user-> get_username());
    UserRepository::set_hash(Connection::get_connection(), $user-> get_id(), $hash);
    Connection::close_connection();
    $to = $user-> get_email();
    $subject = 'Restart your password';
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";
    $headers .= "From: E-logic <elogic@e-logic.us>\r\n";
    $message = '
    <html>
    <body>
    <h3>Restart your password:</h3>
    <p><a href="http://www.elogicportal.com/rfp/restart_password/' . $hash . '">Restart your password</a></p>
    </body>
    </html>
    ';
    mail($to, $subject, $message, $headers);
  }
}
?>
