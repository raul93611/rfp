<?php
class Comment{
  private $id;
  private $id_project;
  private $comment_date;
  private $comment;

  public function __construct($id, $id_project, $comment_date, $comment){
    $this-> id = $id;
    $this-> id_project = $id_project;
    $this-> comment_date = $comment_date;
    $this-> comment = $comment;
  }

  public function get_id(){
    return $this-> id;
  }

  public function get_id_project(){
    return $this-> id_project;
  }

  public function get_comment_date(){
    return $this-> comment_date;
  }

  public function get_comment(){
    return $this-> comment;
  }
}
?>
