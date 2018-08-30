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
  private $flowchart_comments;
  private $flowchart;
  private $designated_user;
  private $reviewed_project;
  private $priority_color;
  private $create_part_comments;
  private $subject;
  private $result;
  private $proposed_price;
  private $business_type;
  private $submitted;
  private $award;
  private $submitted_date;
  private $award_date;
  private $quantity_years;
  private $proposal_description;
  private $proposal_quantity;
  private $proposal_amount;
  private $expiration_date;
  private $address;
  private $ship_to;
  private $total;

  public function __construct($id, $id_user, $start_date, $code, $link, $project_name, $end_date, $priority, $description, $submission_instructions, $type, $flowchart_comments, $flowchart, $designated_user, $reviewed_project, $priority_color, $create_part_comments, $subject, $result, $proposed_price, $business_type, $submitted, $award, $submitted_date, $award_date, $quantity_years, $proposal_description, $proposal_quantity, $proposal_amount, $expiration_date, $address, $ship_to, $total){
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
    $this-> flowchart_comments = $flowchart_comments;
    $this-> flowchart = $flowchart;
    $this-> designated_user = $designated_user;
    $this-> reviewed_project = $reviewed_project;
    $this-> priority_color = $priority_color;
    $this-> create_part_comments = $create_part_comments;
    $this-> subject = $subject;
    $this-> result = $result;
    $this-> proposed_price = $proposed_price;
    $this-> business_type = $business_type;
    $this-> submitted = $submitted;
    $this-> award = $award;
    $this-> submitted_date = $submitted_date;
    $this-> award_date = $award_date;
    $this-> quantity_years = $quantity_years;
    $this-> proposal_description = $proposal_description;
    $this-> proposal_quantity = $proposal_quantity;
    $this-> proposal_amount = $proposal_amount;
    $this-> expiration_date = $expiration_date;
    $this-> address = $address;
    $this-> ship_to = $ship_to;
    $this-> total = $total;
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

  public function get_flowchart_comments(){
    return $this-> flowchart_comments;
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

  public function get_create_part_comments(){
    return $this-> create_part_comments;
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

  public function get_award(){
    return $this-> award;
  }

  public function get_submitted_date(){
    return $this-> submitted_date;
  }

  public function get_award_date(){
    return $this-> award_date;
  }

  public function get_quantity_years(){
    return $this-> quantity_years;
  }

  public function get_proposal_description(){
    return $this-> proposal_description;
  }

  public function get_proposal_quantity(){
    return $this-> proposal_quantity;
  }

  public function get_proposal_amount(){
    return $this-> proposal_amount;
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

  public function get_total(){
    return $this-> total;
  }
}
?>
