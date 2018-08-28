<?php
class Service{
  private $id;
  private $id_project;
  private $total;

  public function __construct($id, $id_project, $total){
    $this-> id = $id;
    $this-> id_project = $id_project;
    $this-> total = $total;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_project(){
    return $this-> id_project;
  }

  public function get_total(){
    return $this-> total;
  }
}
?>
