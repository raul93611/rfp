<?php
class Project{
  private $id;
  private $id_user;
  private $project_date;
  private $link;
  private $project_name;
  private $start_date;
  private $end_date;
  private $priority;
  private $description;
  private $way;
  private $type;

  public function __construct($id, $id_user, $project_date, $link, $project_name, $start_date, $end_date, $priority, $description, $way, $type){
    $this-> id = $id;
    $this-> id_user = $id_user;
    $this-> project_date = $project_date;
    $this-> link = $link;
    $this-> project_name = $project_name;
    $this-> start_date = $start_date;
    $this-> end_date = $end_date;
    $this-> priority = $priority;
    $this-> description = $description;
    $this-> way = $way;
    $this-> type = $type;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_user(){
    return $this-> id_user;
  }

  public function get_project_date(){
    return $this-> project_date;
  }

  public function get_link(){
    return $this-> link;
  }

  public function get_project_name(){
    return $this-> project_name;
  }

  public function get_start_date(){
    return $this-> start_date;
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
}
?>
