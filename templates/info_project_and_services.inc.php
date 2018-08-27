<?php
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
Connection::close_connection();
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-2">
                  <?php
                  if($project-> get_award()){
                    ?><h1 class="text-success"><i class="fa fa-check"></i> Award</h1><?php
                  }else if($project-> get_submitted()){
                    ?><h1 class="text-success"><i class="fa fa-check"></i> Submitted</h1><?php
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
                  <form role="form" method="post" enctype="multipart/form-data" action="<?php echo SAVE_INFO_PROJECT_AND_SERVICES . $id_project; ?>">
                      <?php
                        include_once 'templates/form_info_project_and_services.inc.php';
                      ?>
                  </form>
                </div>
            </div>
        </div>
    </section>
</div>
