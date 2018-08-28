<?php
if($project-> get_type() == 'services_and_equipment'){
  Conexion::abrir_conexion();
  $rfp_connection = RepositorioRfpConnection::obtener_rfp_connection_por_id_project(Conexion::obtener_conexion(), $id_project);
  Conexion::cerrar_conexion();
  $id_rfq = $rfp_connection-> obtener_id_rfq();
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
?>
<input type="hidden" name="id_project" id="id_project" value="<?php echo $id_project; ?>">
<?php
include_once 'templates/links_and_documents_main_form.inc.php';
include_once 'templates/main_info_main_form.inc.php';
include_once 'templates/items_main_form.inc.php';
include_once 'templates/staff_and_costs_main_form.inc.php';
include_once 'templates/total_main_form.inc.php';
?>
<input type="hidden" name="total_by_year" value="<?php echo $total_by_year; ?>">
<input type="hidden" name="total_service" value="<?php echo $total_service; ?>">
<?php
include_once 'templates/options_when_submitted_main_form.inc.php';
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Comments</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <textarea class="form-control" name="story_comments" id="story_comments" rows="5"></textarea>
    </div>
  </div>
</div>
<div class="card-footer footer">
  <a class="btn btn-primary" id="go_back" href="<?php echo CALENDAR_PROJECTS; ?>"><i class="fa fa-reply"></i></a>
  <button type="submit" class="btn btn-success" name="save_info_project_and_services"><i class="fa fa-check"></i> Save</button>
  <a class="btn btn-info" href="<?php echo FLOWCHART . $id_project; ?>"><i class="fa fa-book"></i> Flowchart</a>
  <a class="btn btn-info" href="<?php echo ADD_STAFF . $id_project; ?>"><i class="fa fa-plus"></i> Add staff</a>
  <a class="btn btn-info" href="<?php echo ADD_COST . $id_project; ?>"><i class="fa fa-plus"></i> Add costs</a>
  <a class="btn btn-info" href="<?php echo MAKE_PROPOSAL . $id_project; ?>"><i class="fa fa-cogs"></i> Make proposal</a>
</div>
</div>
