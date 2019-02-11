<?php
Connection::open_connection();
$user = UserRepository::get_user_by_id(Connection::get_connection(), $id_user);
Connection::close_connection();
if($level != 1){
  Redireccion::redirigir1(PERFIL);
}
?>
<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-highlighter"></i> Edit user</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username ..." autofocus required value="<?php echo $user-> get_username(); ?>">
    </div>
    <div class="form-group">
      <label for="names">First names:</label>
      <input type="text" class="form-control" id="names" name="names" placeholder="First names ..." required value="<?php echo $user-> get_names(); ?>">
    </div>
    <div class="form-group">
      <label for="last_names">Last names:</label>
      <input type="text" class="form-control" id="last_names" name="last_names" placeholder="Last names ..." required value="<?php echo $user-> get_last_names(); ?>">
    </div>
    <div class="form-group">
      <label for="level">Level:</label>
      <select class="form-control" name="level" id="level">
        <option value="boss" <?php if($user-> get_level() == 2){echo 'selected';} ?>>Boss</option>
        <option value="head_of_area" <?php if($user-> get_level() == 3){echo 'selected';} ?>>Head of area</option>
        <option value="common_user" <?php if($user-> get_level() == 4){echo 'selected';} ?>>Common user</option>
        <option value="technician" <?php if($user-> get_level() == 5){echo 'selected';} ?>>Technician</option>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email ..." required value="<?php echo $user-> get_email(); ?>">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password ...">
    </div>
  </div>
  <div class="card-footer">
    <button type="submit" class="btn btn-success" name="edit_user"><i class="fa fa-check"></i> Save</button>
  </div>
</div>
