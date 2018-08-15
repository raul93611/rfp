<?php
class ServiceRepository{
  public static function insert_service($connection, $service){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO services(id_project, total) VALUES(:id_project, :total)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $service-> get_id_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':total', $service-> get_total(), PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_service_by_id_project($connection, $id_project){
    $service = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM services WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $service = new Service($result['id'], $result['id_project'], $result['total']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $service;
  }

  public static function get_service_by_id($connection, $id_service){
    $service = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM services WHERE id = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $service = new Service($result['id'], $result['id_project'], $result['total']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $service;
  }

  public static function set_total_service($connection, $total_service, $id_service){
    if(isset($connection)){
      try{
        $sql = 'UPDATE services SET total = :total_service WHERE id = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':total_service', $total_service, PDO::PARAM_STR);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }
}
?>
