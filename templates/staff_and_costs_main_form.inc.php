<div class="card card-primary" id="staff">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Staff</h3>
  </div>
  <div class="card-body">
    <?php
    if($project-> get_submission_instructions() == 'gsa'){
      $gsa = '1';
    }else{
      $gsa = '0';
    }
    Connection::open_connection();
    $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
    list($total_staff, $staff_exists) = StaffRepository::print_all_staff($service-> get_id(), $gsa);
    Connection::close_connection();
    if(!$staff_exists){
      ?><h3 class="text-center text-warning"><i class="fa fa-exclamation-triangle"></i> Not yet filled out</h3><?php
    }
    ?>
  </div>
</div>
<div class="card card-primary" id="costs">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Costs</h3>
  </div>
  <div class="card-body">
    <?php
    list($total_costs, $costs_exists) = CostRepository::print_costs($service-> get_id());
    if(!$costs_exists){
      ?><h3 class="text-center text-warning"><i class="fa fa-exclamation-triangle"></i> Not yet filled out</h3><?php
    }
    ?>
  </div>
</div>
