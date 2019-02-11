<?php
class Task{
  private $id;
  private $id_project;
  private $id_user;
  private $designated_user;
  private $end_date;
  private $description;

  public function __construct($id, $id_project, $id_user, $designated_user, $end_date, $description){
    $this-> id = $id;
    $this-> id_project = $id_project;
    $this-> id_user = $id_user;
    $this-> designated_user = $designated_user;
    $this-> end_date = $end_date;
    $this-> description = $description;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_project(){
    return $this-> id_project;
  }

  public function get_id_user(){
    return $this-> id_user;
  }

  public function get_designated_user(){
    return $this-> designated_user;
  }

  public function get_end_date(){
    return $this-> end_date;
  }

  public function get_description(){
    return $this-> description;
  }
}
?>
