<?php
session_start();
Connection::open_connection();
$partner = PartnerListRepository::get_partner_by_id(Connection::get_connection(), $id_partner);
Connection::close_connection();
?>
<form id="form_partner" action="<?php echo SAVE_PARTNER; ?>" method="post">
  <div class="form-group">
    <label for="company_name">Company:</label>
    <input type="text" name="company_name" class="form-control form-control-sm" value="<?php echo $partner-> get_company_name(); ?>">
  </div>
  <div class="form-group">
    <label for="poc_name">POC:</label>
    <input type="text" name="poc_name" class="form-control form-control-sm" value="<?php echo $partner-> get_poc_name(); ?>">
  </div>
  <div class="form-group">
    <label for="partner_phone">Phone:</label>
    <input type="text" name="partner_phone" class="form-control form-control-sm" value="<?php echo $partner-> get_phone(); ?>">
  </div>
  <div class="form-group">
    <label for="partner_email">Email:</label>
    <input type="email" name="partner_email" class="form-control form-control-sm" value="<?php echo $partner-> get_email(); ?>">
  </div>
  <div class="form-group">
    <label for="area_of_expertise">Area of Expertise:</label>
    <input type="text" name="area_of_expertise" class="form-control form-control-sm" value="<?php echo $partner-> get_area_of_expertise(); ?>">
  </div>
  <div class="form-group">
    <label for="elogic_poc_partner">Elogic POC with this partner:</label>
    <input type="text" name="elogic_poc_partner" class="form-control form-control-sm" value="<?php echo $partner-> get_elogic_poc_partner(); ?>">
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" class="custom-control-input" id="worked_before1" name="worked_before1" value="yes"
    <?php
    if($partner-> get_worked_before()){
      echo 'checked';
    }
    ?>
    >
    <label class="custom-control-label" for="worked_before1">Worked with them before</label>
    <input type="hidden" name="id_partner" value="<?php echo $partner-> get_id(); ?>">
  </div>
</form>
