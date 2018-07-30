<?php
class Project{
  private $id;
  private $id_user;
  private $project_date;
  private $link;

  public function __construct($id, $id_user, $project_date, $link){
    $this-> id = $id;
    $this-> id_user = $id_user;
    $this-> project_date = $project_date;
    $this-> link = $link;
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
}
?>
