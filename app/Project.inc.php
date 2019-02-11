<?php
class Project{
  private $id;
  private $id_user;
  private $start_date;
  private $code;
  private $link;
  private $project_name;
  private $end_date;
  private $priority;
  private $description;
  private $submission_instructions;
  private $type;
  private $flowchart;
  private $designated_user;
  private $reviewed_project;
  private $priority_color;
  private $subject;
  private $result;
  private $proposed_price;
  private $business_type;
  private $submitted;
  private $follow_up;
  private $award;
  private $submitted_date;
  private $award_date;
  private $expiration_date;
  private $address;
  private $ship_to;
  private $total_service;
  private $total_equipment;
  private $members;
  private $previous_contract;

  public function __construct($id, $id_user, $start_date, $code, $link, $project_name, $end_date, $priority, $description, $submission_instructions, $type, $flowchart, $designated_user, $reviewed_project, $priority_color, $subject, $result, $proposed_price, $business_type, $submitted, $follow_up, $award, $submitted_date, $award_date, $expiration_date, $address, $ship_to, $total_service, $total_equipment, $members, $previous_contract){
    $this-> id = $id;
    $this-> id_user = $id_user;
    $this-> start_date = $start_date;
    $this-> code = $code;
    $this-> link = $link;
    $this-> project_name = $project_name;
    $this-> end_date = $end_date;
    $this-> priority = $priority;
    $this-> description = $description;
    $this-> submission_instructions = $submission_instructions;
    $this-> type = $type;
    $this-> flowchart = $flowchart;
    $this-> designated_user = $designated_user;
    $this-> reviewed_project = $reviewed_project;
    $this-> priority_color = $priority_color;
    $this-> subject = $subject;
    $this-> result = $result;
    $this-> proposed_price = $proposed_price;
    $this-> business_type = $business_type;
    $this-> submitted = $submitted;
    $this-> follow_up = $follow_up;
    $this-> award = $award;
    $this-> submitted_date = $submitted_date;
    $this-> award_date = $award_date;
    $this-> expiration_date = $expiration_date;
    $this-> address = $address;
    $this-> ship_to = $ship_to;
    $this-> total_service = $total_service;
    $this-> total_equipment = $total_equipment;
    $this-> members = $members;
    $this-> previous_contract = $previous_contract;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_user(){
    return $this-> id_user;
  }

  public function get_start_date(){
    return $this-> start_date;
  }

  public function get_code(){
    return $this-> code;
  }

  public function get_link(){
    return $this-> link;
  }

  public function get_project_name(){
    return $this-> project_name;
  }

  public function get_end_date(){
    return $this-> end_date;
  }

  public function get_priority(){
    return $this-> priority;
  }

  public function get_description(){
    return $this-> description;
  }

  public function get_submission_instructions(){
    return $this-> submission_instructions;
  }

  public function get_type(){
    return $this-> type;
  }

  public function get_flowchart(){
    return $this-> flowchart;
  }

  public function get_designated_user(){
    return $this-> designated_user;
  }

  public function get_reviewed_project(){
    return $this-> reviewed_project;
  }

  public function get_priority_color(){
    return $this-> priority_color;
  }

  public function get_subject(){
    return $this-> subject;
  }

  public function get_result(){
    return $this-> result;
  }

  public function get_proposed_price(){
    return $this-> proposed_price;
  }

  public function get_business_type(){
    return $this-> business_type;
  }

  public function get_submitted(){
    return $this-> submitted;
  }

  public function get_follow_up(){
    return $this-> follow_up;
  }

  public function get_award(){
    return $this-> award;
  }

  public function get_submitted_date(){
    return $this-> submitted_date;
  }

  public function get_award_date(){
    return $this-> award_date;
  }

  public function get_expiration_date(){
    return $this-> expiration_date;
  }

  public function get_address(){
    return $this-> address;
  }

  public function get_ship_to(){
    return $this-> ship_to;
  }

  public function get_total_service(){
    return $this-> total_service;
  }

  public function get_total_equipment(){
    return $this-> total_equipment;
  }

  public function get_members(){
    return $this-> members;
  }

  public function get_previous_contract(){
    return $this-> previous_contract;
  }
}
?>
