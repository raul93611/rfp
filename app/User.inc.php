<?php
class User{
    private $id;
    private $username;
    private $password;
    private $names;
    private $last_names;
    private $level;
    private $email;

    public function __construct($id, $username, $password, $names, $last_names, $level, $email){
        $this-> id = $id;
        $this-> username = $username;
        $this-> password = $password;
        $this-> names = $names;
        $this-> last_names = $last_names;
        $this-> level = $level;
        $this-> email = $email;
    }

    public function get_id(){
        return $this-> id;
    }

    public function get_username(){
        return $this-> username;
    }

    public function get_password(){
        return $this-> password;
    }

    public function get_names(){
        return $this-> names;
    }

    public function get_last_names(){
        return $this-> last_names;
    }

    public function get_level(){
        return $this-> level;
    }

    public function get_email(){
        return $this-> email;
    }
}
?>
