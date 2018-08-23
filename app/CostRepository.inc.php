<?php
class CostRepository{
  public static function insert_cost($connection, $cost){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO costs(id_service, description, amount) VALUES(:id_service, :description, :amount)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_service', $cost-> get_id_service(), PDO::PARAM_STR);
        $sentence-> bindParam(':description', $cost-> get_description(), PDO::PARAM_STR);
        $sentence-> bindParam(':amount', $cost-> get_amount(), PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function edit_cost($connection, $description, $amount, $id_cost){
    if(isset($connection)){
      try{
        $sql = 'UPDATE costs SET description = :description, amount = :amount WHERE id = :id_cost';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':description', $description, PDO::PARAM_STR);
        $sentence-> bindParam(':amount', $amount, PDO::PARAM_STR);
        $sentence-> bindParam(':id_cost', $id_cost, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_all_costs_by_id_service($connection, $id_service){
    $costs = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM costs WHERE id_service = :id_service';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_service', $id_service, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $costs[] = new Cost($row['id'], $row['id_service'], $row['description'], $row['amount']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $costs;
  }

  public static function print_cost($cost){
    if(!isset($cost)){
      return;
    }
    ?>
    <tr>
      <td><?php echo $cost-> get_description(); ?></td>
      <td>$ <?php echo $cost-> get_amount(); ?></td>
      <td><?php echo '<a href="' . EDIT_COST . $cost-> get_id() . '" class="btn btn-block btn-sm btn-warning"><i class="fa fa-edit"></i> Edit</a>'; ?></td>
    </tr>
    <?php
  }

  public static function print_costs($id_service){
    Connection::open_connection();
    $costs = self::get_all_costs_by_id_service(Connection::get_connection(), $id_service);
    Connection::close_connection();
    $total_costs = 0;
    if(count($costs)){
      $costs_exists = 1;
      ?>
      <h3>Costs:</h3>
      <table id="costs_table" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>DESCRIPTION</th>
            <th>AMOUNT</th>
            <th id="options">OPTIONS</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ($costs as $cost) {
            self::print_cost($cost);
            $total_costs += $cost-> get_amount();
          }
          ?>
          <tr>
            <td>TOTAL:</td>
            <td>$ <?php echo $total_costs; ?></td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <?php
    }else{
      $costs_exists = 0;
    }
    return array($total_costs, $costs_exists);
  }

  public static function get_cost_by_id($connection, $id_cost){
    $cost = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM costs WHERE id = :id_cost';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_cost', $id_cost, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $cost = new Cost($result['id'], $result['id_service'], $result['description'], $result['amount']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $cost;
  }
}
?>
