<?php
class PartnerList{
  private $id;
  private $id_user;
  private $company_name;
  private $poc_name;
  private $phone;
  private $email;
  private $area_of_expertise;
  private $elogic_poc_partner;
  private $worked_before;

  public function __construct($id, $id_user, $company_name, $poc_name, $phone, $email, $area_of_expertise, $elogic_poc_partner, $worked_before){
    $this-> id = $id;
    $this-> id_user = $id_user;
    $this-> company_name = $company_name;
    $this-> poc_name = $poc_name;
    $this-> phone = $phone;
    $this-> email = $email;
    $this-> area_of_expertise = $area_of_expertise;
    $this-> elogic_poc_partner = $elogic_poc_partner;
    $this-> worked_before = $worked_before;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_user(){
    return $this-> id_user;
  }

  public function get_company_name(){
    return $this-> company_name;
  }

  public function get_poc_name(){
    return $this-> poc_name;
  }

  public function get_phone(){
    return $this-> phone;
  }

  public function get_email(){
    return $this-> email;
  }

  public function get_area_of_expertise(){
    return $this-> area_of_expertise;
  }

  public function get_elogic_poc_partner(){
    return $this-> elogic_poc_partner;
  }

  public function get_worked_before(){
    return $this-> worked_before;
  }
}
?>
