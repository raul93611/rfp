<?php
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
$service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
$staff = StaffRepository::get_all_staff_by_id_service(Connection::get_connection(), $service-> get_id());
$costs = CostRepository::get_all_costs_by_id_service(Connection::get_connection(), $service-> get_id());
$proposal_description2 = explode('|', $project-> get_proposal_description2());
$total_costs = 0;
foreach ($costs as $cost) {
  $total_costs += $cost-> get_amount();
}
$total_costs *= 1.05;
$single_cost_proposal = $total_costs / count($staff);
if($project-> get_submission_instructions() == 'gsa'){
  $gsa = 1;
}else{
  $gsa = 0;
}
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
          <form role="form" method="post" enctype="multipart/form-data" action="<?php echo SAVE_PROPOSAL_DATA2 . $id_project; ?>">
            <?php
              include_once 'templates/form_proposal_data2.inc.php';
            ?>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
