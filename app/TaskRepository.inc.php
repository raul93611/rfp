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

  public static function get_all_tasks_my_tasks($connection, $id_user){
    if(isset($connection)){
      try{
        $sql = 'SELECT id, id_project, id_user, description, end_date as start FROM tasks WHERE designated_user = :id_user AND completed = 0';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function set_completed_task($connection, $id_task){
    if(isset($connection)){
      try{
        $sql = 'UPDATE tasks SET completed = 1 WHERE id = :id_task';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_task', $id_task, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_task_by_id($connection, $id_task){
    $task = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM tasks WHERE id = :id_task';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_task', $id_task, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $task = new Task($result['id'], $result['id_project'], $result['id_user'], $result['designated_user'], $result['end_date'], $result['description'], $result['completed']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $task;
  }

  public static function get_all_tasks_by_id_project($connection, $id_project){
    $tasks = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM tasks WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $tasks[] = new Task($row['id'], $row['id_project'], $row['id_user'], $row['designated_user'], $row['end_date'], $row['description'], $row['completed']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $tasks;
  }

  public static function delete_all_tasks($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM tasks WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }
}
?>
