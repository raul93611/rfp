<?php
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
$services = ServiceRepository::get_services_by_id_project(Connection::get_connection(), $id_project);
Connection::close_connection();
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Projects</h1>
        </div>
        <div class="col-sm-6">

        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo SAVE_PROPOSAL_DATA . $id_project; ?>">
            <?php
              include_once 'templates/form_proposal_data.inc.php';
            ?>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
