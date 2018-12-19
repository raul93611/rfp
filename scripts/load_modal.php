<?php
Connection::open_connection();
$contact = ContactListRepository::get_contact_by_id_project(Connection::get_connection(), $id_project);
Connection::close_connection();
?>
<form id="form_contact" action="<?php echo SAVE_CONTACT; ?>" method="post">
  <div class="form-group">
    <label for="contact_name">Name:</label>
    <input type="text" class="form-control form-control-sm" name="contact_name" value="<?php echo $contact-> get_name(); ?>">
  </div>
  <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control form-control-sm" name="phone" value="<?php echo $contact-> get_phone(); ?>">
  </div>
  <div class="form-group">
    <label for="contact_email">Email:</label>
    <input type="email" class="form-control form-control-sm" name="contact_email" value="<?php echo $contact-> get_email(); ?>">
  </div>
  <div class="form-group">
    <label for="agency">Agency:</label>
    <input type="text" class="form-control form-control-sm" name="agency" value="<?php echo $contact-> get_agency(); ?>">
  </div>
  <input type="hidden" name="id_contact" value="<?php echo $contact-> get_id(); ?>">
</form>
