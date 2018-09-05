<?php
class TaskRepository{
  public static function insert_task($connection, $task){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO tasks(id_project, id_user, designated_user, end_date, description) VALUES(:id_project, :id_user, :designated_user, :end_date, :description)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $task-> get_id_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':id_user', $task-> get_id_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':designated_user', $task-> get_designated_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $task-> get_end_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':description', $task-> get_description(), PDO::PARAM_STR);
        $sentence-> execute();        
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }
}
?>
