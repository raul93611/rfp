<?php
class ContactListRepository{
  public static function insert_contact($connection, $contact){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO contact_list(id_project, name, phone, email, agency) VALUES(:id_project, :name, :phone, :email, :agency)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $contact-> get_id_project(), PDO::PARAM_STR);
        $sentence-> bindParam(':name', $contact-> get_name(), PDO::PARAM_STR);
        $sentence-> bindParam(':phone', $contact-> get_phone(), PDO::PARAM_STR);
        $sentence-> bindParam(':email', $contact-> get_email(), PDO::PARAM_STR);
        $sentence-> bindParam(':agency', $contact-> get_agency(), PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_contact_by_id_project($connection, $id_project){
    $contact = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM contact_list WHERE id_project = :id_project';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_project', $id_project, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $contact = new ContactList($result['id'], $result['id_project'], $result['name'], $result['phone'], $result['email'], $result['agency']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $contact;
  }

  public static function set_info_contact($connection, $name, $phone, $email, $agency, $id_contact){
    if(isset($connection)){
      try{
        $sql = 'UPDATE contact_list SET name = :name, phone = :phone, email = :email, agency = :agency WHERE id = :id_contact';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':name', $name, PDO::PARAM_STR);
        $sentence-> bindParam(':phone', $phone, PDO::PARAM_STR);
        $sentence-> bindParam(':email', $email, PDO::PARAM_STR);
        $sentence-> bindParam(':agency', $agency, PDO::PARAM_STR);
        $sentence-> bindParam(':id_contact', $id_contact, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function print_contact($award_project){
    if (!isset($award_project)) {
      return;
    }
    $award_date = ProjectRepository::mysql_date_to_english_format($award_project-> get_award_date());
    Connection::open_connection();
    $contact = self::get_contact_by_id_project(Connection::get_connection(), $award_project-> get_id());
    Connection::close_connection();
    ?>
    <tr>
      <td>
        <a href="#" class="edit_contact_button btn-block"><?php echo $award_project-> get_id(); ?></a>
      </td>
      <td><?php echo $contact-> get_name(); ?></td>
      <td><?php echo $contact-> get_phone(); ?></td>
      <td><?php echo $contact-> get_email(); ?></td>
      <td><?php echo $award_project-> get_type(); ?></td>
      <td><?php echo $contact-> get_agency(); ?></td>
      <td><?php echo $award_date; ?></td>
      <td>$ <?php echo $award_project-> get_total_service(); ?></td>
    </tr>
    <?php
  }

  public static function print_contact_list(){
    Connection::open_connection();
    $award_projects = ProjectRepository::get_all_award_projects(Connection::get_connection());
    Connection::close_connection();
    ?>
    <table id="contact_list_table" class="table table-bordered table-responsive-md">
      <thead>
        <tr>
          <th>PROPOSAL</th>
          <th>NAME</th>
          <th>PHONE</th>
          <th>EMAIL</th>
          <th>TYPE</th>
          <th>AGENCY</th>
          <th>AWARD DATE</th>
          <th>AMOUNT</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($award_projects as $award_project) {
          self::print_contact($award_project);
        }
        ?>
      </tbody>
    </table>
    <?php
  }

  public static function delete_contact($connection, $id_project){
    if(isset($connection)){
      try{
        $sql = 'DELETE FROM contact_list WHERE id_project = :id_project';
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
