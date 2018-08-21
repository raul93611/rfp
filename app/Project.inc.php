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
  private $way;
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

  public function __construct($id, $id_user, $start_date, $code, $link, $project_name, $end_date, $priority, $description, $way, $type, $flowchart_comments, $flowchart, $designated_user, $reviewed_project, $priority_color, $create_part_comments, $subject, $result, $proposed_price){
    $this-> id = $id;
    $this-> id_user = $id_user;
    $this-> start_date = $start_date;
    $this-> code = $code;
    $this-> link = $link;
    $this-> project_name = $project_name;
    $this-> end_date = $end_date;
    $this-> priority = $priority;
    $this-> description = $description;
    $this-> way = $way;
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

  public function get_way(){
    return $this-> way;
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
    return $this-> subject;
  }

  public function get_proposed_price(){
    return $this-> proposed_price;
  }
}
?>
