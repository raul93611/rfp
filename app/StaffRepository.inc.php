<?php
class StaffRepository{
  public static function insert_staff($connection, $staff){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO staff(id_service, name, hourly_rate, rate, office_expenses, burdened_rate, fblr, hours_project, total_burdened_rate, total_fblr) VALUES(:id_service, :name, :hourly_rate, :rate, :office_expenses, :burdened_rate, :fblr, :hours_project, :total_burdened_rate, :total_fblr)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_service', $staff-> get_id_service(), PDO::PARAM_STR);
        $sentence-> bindParam(':name', $staff-> get_name(), PDO::PARAM_STR);
        $sentence-> bindParam(':hourly_rate', $staff-> get_hourly_rate(), PDO::PARAM_STR);
        $sentence-> bindParam(':rate', $staff-> get_rate(), PDO::PARAM_STR);
        $sentence-> bindParam(':office_expenses', $staff-> get_office_expenses(), PDO::PARAM_STR);
        $sentence-> bindParam(':burdened_rate', $staff-> get_burdened_rate(), PDO::PARAM_STR);
        $sentence-> bindParam(':fblr', $staff-> get_fblr(), PDO::PARAM_STR);
        $sentence-> bindParam(':hours_project', $staff-> get_hours_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':total_burdened_rate', $staff-> get_total_burdened_rate(), PDO::PARAM_STR);
        $sentence-> bindParam(':total_fblr', $staff-> get_total_fblr(), PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function edit_single_staff($connection, $name, $hourly_rate, $rate, $office_expenses, $burdened_rate, $fblr, $hours_project, $total_burdened_rate, $total_fblr, $id_staff){
    if(isset($connection)){
      try{
        $sql = 'UPDATE staff SET name = :name, hourly_rate = :hourly_rate, rate = :rate, office_expenses = :office_expenses, burdened_rate = :burdened_rate, fblr = :fblr, hours_project = :hours_project, total_burdened_rate = :total_burdened_rate, total_fblr = :total_fblr WHERE id = :id_staff';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':name', $name, PDO::PARAM_STR);
        $sentence-> bindParam(':hourly_rate', $hourly_rate, PDO::PARAM_STR);
        $sentence-> bindParam(':rate', $rate, PDO::PARAM_STR);
        $sentence-> bindParam(':office_expenses', $office_expenses, PDO::PARAM_STR);
        $sentence-> bindParam(':burdened_rate', $burdened_rate, PDO::PARAM_STR);
        $sentence-> bindParam(':fblr', $fblr, PDO::PARAM_STR);
        $sentence-> bindParam(':hours_project', $hours_project, PDO::PARAM_STR);
        $sentence-> bindParam(':total_burdened_rate', $total_burdened_rate, PDO::PARAM_STR);
        $sentence-> bindParam(':total_fblr', $total_fblr, PDO::PARAM_STR);
        $sentence-> bindParam(':id_staff', $id_staff, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_all_staff_by_id_service($connection, $id_service){
    $staff = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM staff WHERE id_service = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $staff[] = new Staff($row['id'], $row['id_service'], $row['name'], $row['hourly_rate'], $row['rate'], $row['office_expenses'], $row['burdened_rate'], $row['fblr'], $row['hours_project'], $row['total_burdened_rate'], $row['total_fblr']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $staff;
  }

  public static function print_single_staff($single_staff, $gsa){
    if(!isset($single_staff)){
      return;
    }
    ?>
    <tr>
      <td><?php echo $single_staff-> get_name(); ?></td>
      <td>$ <?php echo $single_staff-> get_hourly_rate(); ?></td>
      <td><?php echo $single_staff-> get_rate(); ?> %</td>
      <td>$ <?php echo $single_staff-> get_office_expenses(); ?></td>
      <td>$ <?php if($gsa){echo $single_staff-> get_fblr();}else{echo $single_staff-> get_burdened_rate();} ?></td>
      <td><?php echo $single_staff-> get_hours_project(); ?></td>
      <td>$ <?php if($gsa){echo $single_staff-> get_total_fblr();}else{echo $single_staff-> get_total_burdened_rate();} ?></td>
      <td class="text-center">
        <?php
        echo '<a href="' . EDIT_SINGLE_STAFF . $single_staff-> get_id() . '" class="delete_staff_button btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>';
        echo ' ';
        echo '<a href="' . DELETE_SINGLE_STAFF . $single_staff-> get_id() . '" class="delete_staff_button btn btn-sm btn-warning"><i class="fa fa-trash"></i></a>';
        ?>
      </td>
    </tr>
    <?php
  }

  public static function print_all_staff($id_service, $gsa){
    Connection::open_connection();
    $staff = self::get_all_staff_by_id_service(Connection::get_connection(), $id_service);
    Connection::close_connection();
    $total_staff = 0;
    if(count($staff)){
      $staff_exists = 1;
      ?>
      <h3>Staff:</h3>
      <table id="staff_table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>NAME</th>
            <th>HOURLY RATE</th>
            <th>RATE</th>
            <th>OFFICE EXPENSES</th>
            <th>BURDENED RATE</th>
            <th>HOURS PROJECT</th>
            <th>TOTAL</th>
            <th id="disable_user">OPTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($staff as $single_staff) {
            self::print_single_staff($single_staff, $gsa);
            if($gsa){
              $total_staff += $single_staff-> get_total_fblr();
            }else{
              $total_staff += $single_staff-> get_total_burdened_rate();
            }
          }
          ?>
          <tr>
            <td>TOTAL:</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>$ <?php echo $total_staff; ?></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <?php
    }else{
      $staff_exists = 0;
    }
    return array($total_staff, $staff_exists);
  }

  public static function get_staff_by_id($connection, $id_staff){
    $staff = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM staff WHERE id = :id_staff';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_staff', $id_staff, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $staff = new Staff($result['id'], $result['id_service'], $result['name'], $result['hourly_rate'], $result['rate'], $result['office_expenses'], $result['burdened_rate'], $result['fblr'], $result['hours_project'], $result['total_burdened_rate'], $result['total_fblr']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $staff;
  }

  public static function delete_all_staff($connection, $id_service){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM staff WHERE id_service = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function delete_single_staff($connection, $id_single_staff){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM staff WHERE id = :id_single_staff';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_single_staff', $id_single_staff, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }
}
?>
