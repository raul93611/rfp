<?php
class User{
  private $id;
  private $username;
  private $password;
  private $names;
  private $last_names;
  private $level;
  private $email;
  private $status;
  private $hash_recover_password;

  public function __construct($id, $username, $password, $names, $last_names, $level, $email, $status, $hash_recover_password){
    $this-> id = $id;
    $this-> username = $username;
    $this-> password = $password;
    $this-> names = $names;
    $this-> last_names = $last_names;
    $this-> level = $level;
    $this-> email = $email;
    $this-> status = $status;
    $this-> hash_recover_password = $hash_recover_password;
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

  public function get_status(){
    return $this-> status;
  }

  public function get_hash_recover_password(){
    return $this-> hash_recover_password;
  }
}
?>
