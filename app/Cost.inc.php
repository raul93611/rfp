<?php
class Cost{
  private $id;
  private $id_service;
  private $description;
  private $amount;

  public function __construct($id, $id_service, $description, $amount){
    $this-> id = $id;
    $this-> id_service = $id_service;
    $this-> description = $description;
    $this-> amount = $amount;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_service(){
    return $this-> id_service;
  }

  public function get_description(){
    return $this-> description;
  }

  public function get_amount(){
    return $this-> amount;
  }
}
?>
