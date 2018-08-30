<?php
class Service{
  private $id;
  private $id_project;
  private $total_service;
  private $total_equipment;

  public function __construct($id, $id_project, $total_service, $total_equipment){
    $this-> id = $id;
    $this-> id_project = $id_project;
    $this-> total_service = $total_service;
    $this-> total_equipment = $total_equipment;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_project(){
    return $this-> id_project;
  }

  public function get_total_service(){
    return $this-> total_service;
  }

  public function get_total_equipment(){
    return $this-> total_equipment;
  }
}
?>
