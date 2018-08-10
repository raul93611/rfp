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
}
?>
