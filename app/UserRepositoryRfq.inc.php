<?php
class UserRepositoryRfq{
  public static function get_users($connection) {
      $users = [];
      if (isset($connection)) {
          try {
              $sql = "SELECT * FROM usuarios WHERE cargo > 2";
              $sentence = $connection-> prepare($sql);
              $sentence-> execute();
              $result = $sentence->fetchAll(PDO::FETCH_ASSOC);
              if (count($result)) {
                  foreach ($result as $row) {
                      $users [] = new UserRfq($row['id'], $row['nombre_usuario'], $row['password'], $row['nombres'], $row['apellidos'], $row['cargo'], $row['email']);
                  }
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }
      return $users;
  }
}
?>
