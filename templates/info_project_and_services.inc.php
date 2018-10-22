<?php
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
Connection::close_connection();
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-3">
          <h1>Project: <small><?php echo $project-> get_id(); ?></small></h1>
        </div>
        <div class="col-sm-6 text-center">
          <a href="<?php echo DELETE_PROJECT . $project-> get_id(); ?>" class="delete_complete_project_button btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
          <?php
          if($project-> get_type() == 'services_and_equipment'){
            ?>
            <a href="<?php echo DELETE_ONLY_PROJECT . $project-> get_id(); ?>" class="delete_only_project_button btn btn-danger"><i class="fas fa-trash"></i> Delete only project</a>
            <?php
          }
          ?>
        </div>
        <div class="col-sm-3">
          <?php
          if($project-> get_award()){
            ?><h1 class="text-success float-right"><i class="fa fa-check"></i> Award</h1><?php
          }else if($project-> get_submitted()){
            ?><h1 class="text-success float-right"><i class="fa fa-check"></i> Submitted</h1><?php
          }
          ?>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="post" id="form_info_project_and_services" enctype="multipart/form-data" action="<?php echo SAVE_INFO_PROJECT_AND_SERVICES . $id_project; ?>">
            <?php
              include_once 'templates/form_info_project_and_services.inc.php';
            ?>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
<!--*****************************************MODAL TASK**********************************************************************-->
<div class="modal fade" id="form_add_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_task" method="post" action="<?php echo SAVE_TASK; ?>">
          <div class="form-group">
            <?php
            Connection::open_connection();
            $users = UserRepository::get_all_users_enabled(Connection::get_connection());
            Connection::close_connection();
            ?>
            <?php
            if (count($users)) {
              ?>
              <label for="designated_user">Designated user:</label>
                <select id="designated_user_task" class="form-control form-control-sm" name="designated_user_task">
                <?php
                foreach ($users as $user) {
                  ?>
                  <option value="<?php echo $user-> get_id(); ?>"><?php echo $user-> get_username(); ?></option>
                  <?php
                  }
                  ?>
                </select>
              <?php
            }
            ?>
          </div>
          <div class="form-group">
            <label for="end_date_task">End date:</label>
            <input type="text" name="end_date_task" id="end_date_task" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="task_description">Description:</label>
            <textarea name="task_description" id="task_description" rows="5" class="form-control form-control-sm"></textarea>
          </div>
          <input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="save_task" form="form_task" class="btn btn-success"><i class="fa fa-check"></i> Send</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
      </div>
    </div>
  </div>
</div>
