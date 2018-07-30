<?php
class ProjectRepository{
  public static function insert_project($connection, $project){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO projects (id_user, project_date, link) VALUES(:id_user, :project_date, :link)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $project-> get_id_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':project_date', $project-> get_project_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':link', $project-> get_link(), PDO::PARAM_STR);
        $result = $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_all_projects($connection){
    $projects = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT project_date as start FROM projects';
        $sentence = $connection-> prepare($sql);
        $sentence->execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }
}
?>
