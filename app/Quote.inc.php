<?php
class Quote{
  private $id;
  private $id_project;
  private $designated_user;
  private $code;
  private $type_of_bid;
  private $total_cost;
  private $total_price;
  private $comments;
  private $payment_terms;
  private $address;
  private $ship_to;
  private $ship_via;
  private $taxes;
  private $profit;
  private $additional;
  private $shipping_cost;
  private $shipping;

  public function __construct($id, $id_project, $designated_user, $code, $type_of_bid, $total_cost, $total_price, $comments, $payment_terms, $address, $ship_to, $ship_via, $taxes, $profit, $additional, $shipping_cost, $shipping){
    $this-> id = $id;
    $this-> id_project = $id_project;
    $this-> designated_user = $designated_user;
    $this-> code = $code;
    $this-> type_of_bid = $type_of_bid;
    $this-> total_cost = $total_cost;
    $this-> total_price = $total_price;
    $this-> comments = $comments;
    $this-> payment_terms = $payment_terms;
    $this-> address = $address;
    $this-> ship_to = $ship_to;
    $this-> ship_via = $ship_via;
    $this-> taxes = $taxes;
    $this-> profit = $profit;
    $this-> additional = $additional;
    $this-> shipping_cost = $shipping_cost;
    $this-> shipping = $shipping;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_project(){
    return $this-> id_project;
  }

  public function get_designated_user(){
    return $this-> designated_user;
  }

  public function get_code(){
    return $this-> code;
  }

  public function get_type_of_bid(){
    return $this-> type_of_bid;
  }

  public function get_total_cost(){
    return $this-> total_cost;
  }

  public function get_total_price(){
    return $this-> total_price;
  }

  public function get_comments(){
    return $this-> comments;
  }

  public function get_payment_terms(){
    return $this-> payment_terms;
  }

  public function get_address(){
    return $this-> address;
  }

  public function get_ship_to(){
    return $this-> ship_to;
  }

  public function get_ship_via(){
    return $this-> ship_via;
  }

  public function get_taxes(){
    return $this-> taxes;
  }

  public function get_profit(){
    return $this-> profit;
  }

  public function get_additional(){
    return $this-> additional;
  }

  public function get_shipping_cost(){
    return $this-> shipping_cost;
  }

  public function get_shipping(){
    return $this-> shipping;
  }
}
?>
