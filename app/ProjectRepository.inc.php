<?php
class ProjectRepository{
  public static function insert_project($connection, $project){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO projects (id_user, project_date, link, project_name, start_date, end_date, priority, description, way, type) VALUES(:id_user, :project_date, :link, :project_name, :start_date, :end_date, :priority, :description, :way, :type)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $project-> get_id_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':project_date', $project-> get_project_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':link', $project-> get_link(), PDO::PARAM_STR);
        $sentence-> bindParam(':project_name', $project-> get_project_name(), PDO::PARAM_STR);
        $sentence-> bindParam(':start_date', $project-> get_start_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $project-> get_end_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $project-> get_priority(), PDO::PARAM_STR);
        $sentence-> bindParam(':description', $project-> get_description(), PDO::PARAM_STR);
        $sentence-> bindParam(':way', $project-> get_way(), PDO::PARAM_STR);
        $sentence-> bindParam(':type', $project-> get_type(), PDO::PARAM_STR);
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
        $sql = 'SELECT id, project_date as start, link as title FROM projects';
        $sentence = $connection-> prepare($sql);
        $sentence->execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function fill_out_project($connection, $id_project, $project_name, $start_date, $end_date, $priority, $description, $way, $type){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET project_name = :project_name, start_date = :start_date, end_date = :end_date, priority = :priority, description = :description, way = :way, type = :type WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $sentence-> bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $priority, PDO::PARAM_STR);
        $sentence-> bindParam(':description', $description, PDO::PARAM_STR);
        $sentence-> bindParam(':way', $way, PDO::PARAM_STR);
        $sentence-> bindParam(':type', $type, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $result = $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_project_by_id($connection, $id_project){
    $project = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM projects WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $project = new Project($result['id'], $result['id_user'], $result['project_date'], $result['link'], $result['project_name'], $result['start_date'], $result['end_date'], $result['priority'], $result['description'], $result['way'], $result['type']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $project;
  }

  public static function mysql_date_to_english_format($mysql_date){
    $parts_mysql_date = explode('-', $mysql_date);
    $english_format = $parts_mysql_date[1] . '/' . $parts_mysql_date[2] . '/' . $parts_mysql_date[0];
    return $english_format;
  }

  public static function mysql_datetime_to_english_format($mysql_datetime){
    $parts_mysql_datetime = explode(' ', $mysql_datetime);
    $date = $parts_mysql_datetime[0];
    $time = $parts_mysql_datetime[1];
    $date = self::mysql_date_to_english_format($date);
    $english_format = $date . ' ' . $time;
    return $english_format;
  }

  public static function english_format_to_mysql_date($english_format){
    $parts_english_format = explode('/', $english_format);
    $mysql_date = $parts_english_format[2] . '-' . $parts_english_format[0] . '-' . $parts_english_format[1];
    $mysql_date = strtotime($mysql_date);
    $mysql_date = date('Y-m-d', $mysql_date);
    return $mysql_date;
  }

  public static function english_format_to_mysql_datetime($english_format){
    $parts_english_format = explode(' ', $english_format);
    $date = $parts_english_format[0];
    $time = $parts_english_format[1];
    $parts_date = explode('/', $date);
    $date = $parts_date[2] . '-' . $parts_date[0] . '-' . $parts_date[1];
    $mysql_datetime = $date . ' ' . $time;
    $mysql_datetime = strtotime($mysql_datetime);
    $mysql_datetime = date('Y-m-d H:i:s', $mysql_datetime);
    return $mysql_datetime;
  }
}
?>
