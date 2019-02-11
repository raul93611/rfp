<?php
class ContactList{
  private $id;
  private $id_project;
  private $name;
  private $phone;
  private $email;
  private $agency;

  public function __construct($id, $id_project, $name, $phone, $email, $agency){
    $this-> id = $id;
    $this-> id_project = $id_project;
    $this-> name = $name;
    $this-> phone = $phone;
    $this-> email = $email;
    $this-> agency = $agency;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_project(){
    return $this-> id_project;
  }

  public function get_name(){
    return $this-> name;
  }

  public function get_phone(){
    return $this-> phone;
  }

  public function get_email(){
    return $this-> email;
  }

  public function get_agency(){
    return $this-> agency;
  }
}
?>
