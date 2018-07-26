<?php
if(isset($_POST['log_in'])){

    Connection::open_connection();
    $validator = new UserLoginValidator($_POST['username'], $_POST['password'], Connection::get_connection());
    if($validator-> get_error() == '' && !is_null($validator->get_user())){
        SessionControl::log_in($validator->get_user()->get_id(), $validator->get_user()->get_username());
        Connection::close_connection();
        Redirection::redirect1(PROFILE);
    }

}
?>
