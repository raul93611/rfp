<?php
if($project-> get_type() == 'services_and_equipment'){
  Conexion::abrir_conexion();
  $rfq_quote = RepositorioRfq::obtener_cotizacion_por_id_project(Conexion::obtener_conexion(), $id_project);
  $designated_user_rfq_quote = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $rfq_quote-> obtener_usuario_designado());
  $items = RepositorioItem::obtener_items_por_id_rfq(Conexion::obtener_conexion(), $rfq_quote-> obtener_id());
  Conexion::cerrar_conexion();
  $total_equipment = $rfq_quote-> obtener_total_price();
}else{
  $total_equipment = 0;
}

if($project-> get_start_date() != '0000-00-00'){
  $start_date = ProjectRepository::mysql_date_to_english_format($project-> get_start_date());
}else{
  $start_date = '';
}

if($project-> get_end_date() != '0000-00-00 00:00:00'){
  $end_date = ProjectRepository::mysql_datetime_to_english_format($project-> get_end_date());
}else{
  $end_date = '';
}

if($project-> get_submitted()){
  if($project-> get_expiration_date() != '0000-00-00'){
    $expiration_date = ProjectRepository::mysql_date_to_english_format($project-> get_expiration_date());
  }else{
    $expiration_date = '';
  }
}
?>
<input type="hidden" name="id_project" id="id_project" value="<?php echo $id_project; ?>">
<?php
include_once 'templates/links_and_documents_main_form.inc.php';
if($level != 5){
  include_once 'templates/main_info_main_form.inc.php';
  include_once 'templates/items_main_form.inc.php';
  include_once 'templates/years_main_form.inc.php';
  include_once 'templates/options_when_submitted_main_form.inc.php';
}
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fab fa-rocketchat"></i> Comments</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <textarea class="form-control form-control-sm" name="story_comments" id="story_comments" rows="5"></textarea>
    </div>
  </div>
</div>
<div class="container-fluid">
  <?php
  CommentRepository::print_comments($project-> get_id());
  ?>
  <br>
  <br>
  <br>
</div>
<div class="card-footer footer" id="footer_lg">
  <a class="btn btn-primary" id="go_back" href="<?php echo CALENDAR_PROJECTS; ?>"><i class="fa fa-reply"></i></a>
  <?php
  if($project-> get_flowchart()){
    ?><button type="submit" class="btn btn-success" name="save_info_project_and_services"><i class="fa fa-check"></i> Save</button><?php
  }
  if($level != 5){
    ?>
    <a class="btn  btn-info add_item_charter" href="<?php echo FLOWCHART . $id_project; ?>"><i class="fa fa-book"></i> Flowchart</a>
    <button type="button" class="btn btn-primary" id="add_task"><i class="fas fa-tasks"></i> Add task</button>
    <?php
    if($project-> get_submitted()){
      ?>
      <button type="submit" class="btn btn-success" name="make_proposal"><i class="fa fa-cogs"></i> Proposal</button>
      <?php
    }
    ?>
    <a class="btn btn-primary" href="<?php echo ADD_PREVIOUS_CONTRACT . $id_project; ?>"><i class="fas fa-plus"></i> Previous contract</a>
    <?php
  }
  ?>
</div>
