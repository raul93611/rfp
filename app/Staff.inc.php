<?php
class Staff{
  private $id;
  private $id_service;
  private $name;
  private $hourly_rate;
  private $rate;
  private $office_expenses;
  private $burdened_rate;
  private $fblr;
  private $hours_project;
  private $total_burdened_rate;
  private $total_fblr;
  private $description;
  private $quantity;
  private $amount_proposal;

  public function __construct($id, $id_service, $name, $hourly_rate, $rate, $office_expenses, $burdened_rate, $fblr, $hours_project, $total_burdened_rate, $total_fblr, $description, $quantity, $amount_proposal){
    $this-> id = $id;
    $this-> id_service = $id_service;
    $this-> name = $name;
    $this-> hourly_rate = $hourly_rate;
    $this-> rate = $rate;
    $this-> office_expenses = $office_expenses;
    $this-> burdened_rate = $burdened_rate;
    $this-> fblr = $fblr;
    $this-> hours_project = $hours_project;
    $this-> total_burdened_rate = $total_burdened_rate;
    $this-> total_fblr = $total_fblr;
    $this-> description = $description;
    $this-> quantity = $quantity;
    $this-> amount_proposal = $amount_proposal;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_service(){
    return $this-> id_service;
  }

  public function get_name(){
    return $this-> name;
  }

  public function get_hourly_rate(){
    return $this-> hourly_rate;
  }

  public function get_rate(){
    return $this-> rate;
  }

  public function get_office_expenses(){
    return $this-> office_expenses;
  }

  public function get_burdened_rate(){
    return $this-> burdened_rate;
  }

  public function get_fblr(){
    return $this-> fblr;
  }

  public function get_hours_project(){
    return $this-> hours_project;
  }

  public function get_total_burdened_rate(){
    return $this-> total_burdened_rate;
  }

  public function get_total_fblr(){
    return $this-> total_fblr;
  }

  public function get_description(){
    return $this-> description;
  }

  public function get_quantity(){
    return $this-> quantity;
  }

  public function get_amount_proposal(){
    return $this-> amount_proposal;
  }
}
?>
