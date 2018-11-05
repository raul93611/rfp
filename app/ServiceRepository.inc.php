<?php
class ServiceRepository{
  public static function insert_service($connection, $service){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO services(id_project, total, description, quantity) VALUES(:id_project, :total, :description, :quantity)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $service-> get_id_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':total', $service-> get_total(), PDO::PARAM_STR);
        $sentence-> bindParam(':description', $service-> get_description(), PDO::PARAM_STR);
        $sentence-> bindParam(':quantity', $service-> get_quantity(), PDO::PARAM_STR);
        $sentence-> execute();
        $id = $connection-> lastInsertId();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $id;
  }

  public static function get_services_by_id_project($connection, $id_project){
    $services = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM services WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $services[] = new Service($row['id'], $row['id_project'], $row['total'], $row['description'], $row['quantity']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $services;
  }

  public static function get_first_service_by_id_project($connection, $id_project){
    $service = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM services WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $i=>$row) {
            if(!$i){
              $service = new Service($row['id'], $row['id_project'], $row['total'], $row['description'], $row['quantity']);
            }
          }
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
          $service = new Service($result['id'], $result['id_project'], $result['total'], $result['description'], $result['quantity']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $service;
  }

  public static function delete_services($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM services WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function delete_service($connection, $id_service){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM services WHERE id = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function set_total($connection, $total, $id_service){
    if(isset($connection)){
      try{
        $sql = 'UPDATE services SET total = :total WHERE id = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':total', $total, PDO::PARAM_STR);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function set_info_proposal($connection, $description, $quantity, $id_service){
    if(isset($connection)){
      try{
        $sql = 'UPDATE services SET description = :description, quantity = :quantity WHERE id = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':description', $description, PDO::PARAM_STR);
        $sentence-> bindParam(':quantity', $quantity, PDO::PARAM_STR);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }
}
?>
