<?php
class UserSignInValidator extends UserValidator{
    public function __construct($username, $password1, $password2, $names, $last_names, $email, $connection) {
        $this-> open_alert = "<br><div class='alert alert-danger' role='alert'>";
        $this-> close_alert = "</div>";

        $this-> username = '';
        $this-> password = '';
        $this-> names = '';
        $this-> last_names = '';
        $this-> email = $email;

        $this-> username_error = $this-> validate_username($username, $connection);
        $this-> names_error = $this->validate_names($names);
        $this-> last_names_error = $this->validate_last_names($connection, $last_names, $names);
        $this-> password1_error = $this->validate_password1($password1);
        $this-> password2_error = $this->validate_password2($password1, $password2);

        if ($this-> error_password1 == '' && $this-> error_password2 == '') {
            $this-> password = $password1;
        }
    }
}
?>
