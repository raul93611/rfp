<?php
class ProjectRepository{
  public static function insert_project($connection, $project){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO projects (id_user, start_date, code, link, project_name, end_date, priority, description, submission_instructions, type, flowchart_comments, flowchart, designated_user, reviewed_project, priority_color, create_part_comments, subject, result, proposed_price, business_type) VALUES(:id_user, NOW(), :code, :link, :project_name, :end_date, :priority, :description, :submission_instructions, :type, :flowchart_comments, :flowchart, :designated_user, :reviewed_project, :priority_color, :create_part_comments, :subject, :result, :proposed_price, :business_type)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $project-> get_id_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':code', $project-> get_code(), PDO::PARAM_STR);
        $sentence-> bindParam(':link', $project-> get_link(), PDO::PARAM_STR);
        $sentence-> bindParam(':project_name', $project-> get_project_name(), PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $project-> get_end_date(), PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $project-> get_priority(), PDO::PARAM_STR);
        $sentence-> bindParam(':description', $project-> get_description(), PDO::PARAM_STR);
        $sentence-> bindParam(':submission_instructions', $project-> get_submission_instructions(), PDO::PARAM_STR);
        $sentence-> bindParam(':type', $project-> get_type(), PDO::PARAM_STR);
        $sentence-> bindParam(':flowchart_comments', $project-> get_flowchart_comments(), PDO::PARAM_STR);
        $sentence-> bindParam(':flowchart', $project-> get_flowchart(), PDO::PARAM_STR);
        $sentence-> bindParam(':designated_user', $project-> get_designated_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':reviewed_project', $project-> get_reviewed_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $project-> get_priority_color(), PDO::PARAM_STR);
        $sentence-> bindParam(':create_part_comments', $project-> get_create_part_comments(), PDO::PARAM_STR);
        $sentence-> bindParam(':subject', $project-> get_subject(), PDO::PARAM_STR);
        $sentence-> bindParam(':result', $project-> get_result(), PDO::PARAM_STR);
        $sentence-> bindParam(':proposed_price', $project-> get_proposed_price(), PDO::PARAM_STR);
        $sentence-> bindParam(':business_type', $project-> get_business_type(), PDO::PARAM_STR);
        $result = $sentence-> execute();
        $id = $connection-> lastInsertId();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $id;
  }

  public static function get_all_unreviewed_projects($connection){
    if(isset($connection)){
      try{
        $sql = 'SELECT id, start_date as start, link as title FROM projects WHERE reviewed_project = 0';
        $sentence = $connection-> prepare($sql);
        $sentence->execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function get_all_end_dates_reviewed_projects($connection){
    if(isset($connection)){
      try{
        $sql = 'SELECT id, project_name as title, end_date as start, priority_color as color FROM projects WHERE reviewed_project = 1';
        $sentence = $connection-> prepare($sql);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $result;
  }

  public static function get_all_end_dates_my_projects($connection, $id_user){
    if(isset($connection)){
      try{
        $sql = 'SELECT id, project_name as title, end_date as start, priority_color as color, reviewed_project FROM projects WHERE reviewed_project = 1 AND designated_user = :id_user';
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

  public static function get_all_new_dates_my_projects($connection, $id_user){
    if(isset($connection)){
      try{
        $sql = 'SELECT id, link as title, start_date as start, reviewed_project FROM projects WHERE reviewed_project = 0 AND designated_user = :id_user';
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

  public static function change_main_information_project($connection, $code, $project_name, $business_type, $end_date, $priority, $priority_color, $submission_instructions, $type, $subject, $description, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET code = :code, project_name = :project_name, business_type = :business_type, end_date = :end_date, priority = :priority, priority_color = :priority_color, submission_instructions = :submission_instructions, type = :type, subject = :subject, description = :description WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':code', $code, PDO::PARAM_STR);
        $sentence-> bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $sentence-> bindParam(':business_type', $business_type, PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $priority, PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $priority_color, PDO::PARAM_STR);
        $sentence-> bindParam(':submission_instructions', $submission_instructions, PDO::PARAM_STR);
        $sentence-> bindParam(':type', $type, PDO::PARAM_STR);
        $sentence-> bindParam(':subject', $subject, PDO::PARAM_STR);
        $sentence-> bindParam(':description', $description, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function fill_out_project($connection, $id_project, $code, $project_name, $end_date, $priority, $description, $submission_instructions, $type, $priority_color, $subject, $business_type){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET code = :code, project_name = :project_name, end_date = :end_date, priority = :priority, description = :description, submission_instructions = :submission_instructions, type = :type, priority_color = :priority_color, subject = :subject, business_type = :business_type WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':code', $code, PDO::PARAM_STR);
        $sentence-> bindParam(':project_name', $project_name, PDO::PARAM_STR);
        $sentence-> bindParam(':end_date', $end_date, PDO::PARAM_STR);
        $sentence-> bindParam(':priority', $priority, PDO::PARAM_STR);
        $sentence-> bindParam(':description', $description, PDO::PARAM_STR);
        $sentence-> bindParam(':submission_instructions', $submission_instructions, PDO::PARAM_STR);
        $sentence-> bindParam(':type', $type, PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $priority_color, PDO::PARAM_STR);
        $sentence-> bindParam(':subject', $subject, PDO::PARAM_STR);
        $sentence-> bindParam(':business_type', $business_type, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $result = $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function change_designated_user($connection, $designated_user, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET designated_user = :designated_user WHERE id = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':designated_user', $designated_user, PDO::PARAM_STR);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
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
          $project = new Project($result['id'], $result['id_user'], $result['start_date'], $result['code'], $result['link'], $result['project_name'], $result['end_date'], $result['priority'], $result['description'], $result['submission_instructions'], $result['type'], $result['flowchart_comments'], $result['flowchart'], $result['designated_user'], $result['reviewed_project'], $result['priority_color'], $result['create_part_comments'], $result['subject'], $result['result'], $result['proposed_price'], $result['business_type']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $project;
  }

  public static function save_flowchart_and_flowchart_comments($connection, $flowchart_result, $flowchart_comments, $priority_color, $id_project){
    if(isset($connection)){
      try{
        $sql = 'UPDATE projects SET flowchart = :flowchart, flowchart_comments = :flowchart_comments, reviewed_project = 1, priority_color = :priority_color WHERE id = :id';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':flowchart', $flowchart_result, PDO::PARAM_STR);
        $sentence-> bindParam(':flowchart_comments', $flowchart_comments, PDO::PARAM_STR);
        $sentence-> bindParam(':priority_color', $priority_color, PDO::PARAM_STR);
        $sentence-> bindParam(':id', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function delete_project($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM projects WHERE id = :id';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
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
