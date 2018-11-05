<?php
Connection::open_connection();
$service = ServiceRepository::get_service_by_id(Connection::get_connection(), $id_service);
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $service-> get_id_project());
Connection::close_connection();
?>
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-3">
          <h1>Service</h1>
        </div>
        <div class="col-sm-3">
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form action="<?php echo SAVE_EDIT_SERVICE; ?>" method="post">
            <?php
            include_once 'templates/staff_and_costs.inc.php';
            ?>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
