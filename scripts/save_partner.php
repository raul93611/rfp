<?php
session_start();
if(isset($_POST['save_partner'])){
  Connection::open_connection();
  if(isset($_POST['worked_before1']) && $_POST['worked_before1'] == 'yes'){
    $worked_before = 1;
  }else {
    $worked_before = 0;
  }
  PartnerListRepository::set_info_partner(Connection::get_connection(), $_POST['company_name'], $_POST['poc_name'], $_POST['partner_phone'], $_POST['partner_email'], $_POST['area_of_expertise'], $_POST['elogic_poc_partner'], $worked_before, $_POST['id_partner']);
  Connection::close_connection();
  Redirection::redirect(PARTNER_LIST);
}
?>
