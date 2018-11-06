<?php
class PartnerListRepository{
  public static function insert_partner($connection, $partner){
    if(isset($connection)){
      try{
        $sql = 'INSERT INTO partner_list(id_user, company_name, poc_name, phone, email, area_of_expertise, elogic_poc_partner, worked_before) VALUES(:id_user, :company_name, :poc_name, :phone, :email, :area_of_expertise, :elogic_poc_partner, :worked_before)';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_user', $partner-> get_id_user(), PDO::PARAM_STR);
        $sentence-> bindParam(':company_name', $partner-> get_company_name(), PDO::PARAM_STR);
        $sentence-> bindParam(':poc_name', $partner-> get_poc_name(), PDO::PARAM_STR);
        $sentence-> bindParam(':phone', $partner-> get_phone(), PDO::PARAM_STR);
        $sentence-> bindParam(':email', $partner-> get_email(), PDO::PARAM_STR);
        $sentence-> bindParam(':area_of_expertise', $partner-> get_area_of_expertise(), PDO::PARAM_STR);
        $sentence-> bindParam(':elogic_poc_partner', $partner-> get_elogic_poc_partner(), PDO::PARAM_STR);
        $sentence-> bindParam(':worked_before', $partner-> get_worked_before(), PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }

  public static function get_partner_by_id($connection, $id_partner){
    $partner = null;
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM partner_list WHERE id = :id_partner';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':id_partner', $id_partner, PDO::PARAM_STR);
        $sentence-> execute();
        $result = $sentence-> fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
          $partner = new PartnerList($result['id'], $result['id_user'], $result['company_name'], $result['poc_name'], $result['phone'], $result['email'], $result['area_of_expertise'], $result['elogic_poc_partner'], $result['worked_before']);
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $partner;
  }

  public static function get_all_partners($connection){
    $partner_list = [];
    if(isset($connection)){
      try{
        $sql = 'SELECT * FROM partner_list';
        $sentence = $connection-> prepare($sql);
        $sentence-> execute();
        $result = $sentence-> fetchAll(PDO::FETCH_ASSOC);
        if(count($result)){
          foreach ($result as $row) {
            $partner_list[] = new PartnerList($row['id'], $row['id_user'], $row['company_name'], $row['poc_name'], $row['phone'], $row['email'], $row['area_of_expertise'], $row['elogic_poc_partner'], $row['worked_before']);
          }
        }
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
    return $partner_list;
  }

  public static function print_partner($partner){
    if (!isset($partner)) {
      return;
    }
    ?>
    <tr>
      <td>
        <input type="hidden" class="id_partner" value="<?php echo $partner-> get_id(); ?>">
        <a href="#" class="edit_partner_button btn-block"><?php echo $partner-> get_company_name(); ?></a>
      </td>
      <td><?php echo $partner-> get_poc_name(); ?></td>
      <td><?php echo $partner-> get_phone(); ?></td>
      <td><?php echo $partner-> get_email(); ?></td>
      <td><?php echo $partner-> get_area_of_expertise(); ?></td>
      <td><?php echo $partner-> get_elogic_poc_partner(); ?></td>
      <td>
        <?php
        if($partner-> get_worked_before()){
          echo '<span class="text-success">Yes</span>';
        }else{
          echo '<span class="text-danger">No</span>';
        }
        ?>
      </td>
    </tr>
    <?php
  }

  public static function print_partner_list(){
    Connection::open_connection();
    $partner_list = self::get_all_partners(Connection::get_connection());
    Connection::close_connection();
    ?>
    <table id="partner_list_table" class="table table-bordered table-responsive-md">
      <thead>
        <tr>
          <th>COMPANY</th>
          <th>POC</th>
          <th>PHONE</th>
          <th>EMAIL</th>
          <th>AREA EXPERTISE</th>
          <th>E-LOGIC POC / PARTNER</th>
          <th>WORK BEFORE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($partner_list as $partner) {
          self::print_partner($partner);
        }
        ?>
      </tbody>
    </table>
    <?php
  }

  public static function set_info_partner($connection, $company_name, $poc_name, $phone, $email, $area_of_expertise, $elogic_poc_partner, $worked_before, $id_partner){
    if(isset($connection)){
      try{
        $sql = 'UPDATE partner_list SET company_name = :company_name, poc_name = :poc_name, phone = :phone, email = :email, area_of_expertise = :area_of_expertise, elogic_poc_partner = :elogic_poc_partner, worked_before = :worked_before WHERE id = :id_partner';
        $sentence = $connection-> prepare($sql);
        $sentence-> bindParam(':company_name', $company_name, PDO::PARAM_STR);
        $sentence-> bindParam(':poc_name', $poc_name, PDO::PARAM_STR);
        $sentence-> bindParam(':phone', $phone, PDO::PARAM_STR);
        $sentence-> bindParam(':email', $email, PDO::PARAM_STR);
        $sentence-> bindParam(':area_of_expertise', $area_of_expertise, PDO::PARAM_STR);
        $sentence-> bindParam(':elogic_poc_partner', $elogic_poc_partner, PDO::PARAM_STR);
        $sentence-> bindParam(':worked_before', $worked_before, PDO::PARAM_STR);
        $sentence-> bindParam(':id_partner', $id_partner, PDO::PARAM_STR);
        $sentence-> execute();
      }catch(PDOException $ex){
        print 'ERROR:' . $ex->getMessage() . '<br>';
      }
    }
  }
}
?>
