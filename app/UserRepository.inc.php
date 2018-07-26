<?php
class UserRepository{
  public static function insert_user($connection, $user) {
      $inserted_user = false;
      if (isset($connection)) {
          try {
              $sql = 'INSERT INTO users(username, password, names, last_names, level, email) VALUES(:username, :password, :names, :last_names, :level, :email)';

              $sentence = $connection->prepare($sql);

              $sentence->bindParam(':username', $user->get_username(), PDO::PARAM_STR);
              $sentence->bindParam(':password', $user->get_password(), PDO::PARAM_STR);
              $sentence->bindParam(':names', $user->get_names(), PDO::PARAM_STR);
              $sentence->bindParam(':last_names', $user->get_last_names(), PDO::PARAM_STR);
              $sentence->bindParam(':level', $user->get_level(), PDO::PARAM_STR);
              $sentence->bindParam(':email', $user->get_email(), PDO::PARAM_STR);

              $result = $sentence->execute();

              if ($result) {
                  $inserted_user = true;
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }

      return $inserted_user;
  }

  public static function get_user_by_username($connection, $username) {
      $user = null;
      if (isset($connection)) {
          try {
              $sql = "SELECT * FROM users WHERE username = :username";

              $sentence = $connection->prepare($sql);
              $sentence->bindParam(':username', $username, PDO::PARAM_STR);
              $sentence->execute();

              $result = $sentence->fetch();

              if (!empty($result)) {
                  $user = new User($result['id'], $result['username'], $result['password'], $result['names'], $result['last_names'], $result['level'], $result['email']);
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }
      return $user;
  }

  public static function get_user_by_id($connection, $id_user) {
      $user = null;
      if (isset($connection)) {
          try {
              $sql = "SELECT * FROM users WHERE id = :id_user";

              $sentence = $connection->prepare($sql);
              $sentence->bindParam(':id_user', $id_user, PDO::PARAM_STR);
              $sentence->execute();

              $result = $sentence->fetch();

              if (!empty($result)) {
                  $user = new User($result['id'], $result['username'], $result['password'], $result['names'], $result['last_names'], $result['level'], $result['email']);
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }
      return $user;
  }

  public static function username_exists($connection, $username) {
      $username_exists = true;
      if (isset($connection)) {
          try {
              $sql = "SELECT * FROM users WHERE username = :username";

              $sentence = $connection->prepare($sql);
              $sentence->bindParam(':username', $username, PDO::PARAM_STR);
              $sentence->execute();

              $result = $sentence->fetchAll();

              if (count($result)) {
                  $username_exists = true;
              } else {
                  $username_exists = false;
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }
      return $username_exists;
  }

  public static function full_name_exists($connection, $last_names, $names) {
      $full_name_exists = true;
      if (isset($connection)) {
          try {
              $sql = "SELECT * FROM users WHERE names = :names AND last_names = :last_names";

              $sentence = $connection->prepare($sql);
              $sentence->bindParam(':names', $names, PDO::PARAM_STR);
              $sentence->bindParam(':last_names', $last_names, PDO::PARAM_STR);
              $sentence->execute();

              $result = $sentence->fetchAll();

              if (count($result)) {
                  $full_name_exists = true;
              } else {
                  $full_name_exists = false;
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }
      return $full_name_exists;
  }

  public static function count_users($connection) {
      $total_users = 0;
      if (isset($connection)) {
          try {
              $sql = "SELECT COUNT(*) as total_users FROM users WHERE level != 1";

              $sentence = $connection->prepare($sql);
              $sentence->execute();

              $result = $sentence->fetch();

              if (!empty($result)) {
                  $total_users = $result['total_users'];
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }
      return $total_users;
  }

  public static function get_all_users($connection) {
      $users = [];

      if (isset($connection)) {
          try {
              $sql = "SELECT * FROM users WHERE level != 1";

              $sentence = $connection->prepare($sql);

              $sentence->execute();

              $result = $sentence->fetchAll();

              if (count($result)) {
                  foreach ($result as $row) {
                      $users [] = new User($row['id'], $row['username'], $row['password'], $row['names'], $row['last_names'], $row['level'], $row['email']);
                  }
              }
          } catch (PDOException $ex) {
              print 'ERROR:' . $ex->getMessage() . '<br>';
          }
      }
      return $users;
  }

  public static function print_user($user) {
      if (!isset($user)) {
          return;
      }
      ?>
      <tr>
          <td><?php echo $user->get_names(); ?></td>
          <td><?php echo $user->get_last_names(); ?></td>
          <td></td>
      </tr>
      <?php
  }

  public static function print_users() {
      Connection::open_connection();
      $users = self::get_all_users(Connection::get_connection());
      Connection::close_connection();

      if (count($users)) {
          ?>
          <table class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <th>FIRST NAMES</th>
                      <th>LAST NAMES</th>
                      <th>OPTIONS</th>
                  </tr>
              </thead>
              <tbody id="users_table">
                  <?php
                  foreach ($users as $user) {
                      self::print_user($user);
                  }
                  ?>
              </tbody>
          </table>
          <?php
      }
  }
}
?>
