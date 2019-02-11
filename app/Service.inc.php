<?php
class Service{
  private $id;
  private $id_project;
  private $total;
  private $description;
  private $quantity;

  public function __construct($id, $id_project, $total, $description, $quantity){
    $this-> id = $id;
    $this-> id_project = $id_project;
    $this-> total = $total;
    $this-> description = $description;
    $this-> quantity = $quantity;
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

  public function get_description(){
    return $this-> description;
  }

  public function get_quantity(){
    return $this-> quantity;
  }
}
?>
