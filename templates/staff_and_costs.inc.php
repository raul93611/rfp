<div class="card card-primary" id="staff">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-user-tie"></i> Staff</h3>
  </div>
  <div class="card-body">
    <?php
    if($project-> get_submission_instructions() == 'gsa'){
      $gsa = '1';
    }else{
      $gsa = '0';
    }
    Connection::open_connection();
    list($total_staff, $staff_exists) = StaffRepository::print_all_staff($service-> get_id(), $gsa);
    Connection::close_connection();
    if(!$staff_exists){
      ?><h3 id="no_staff" class="text-center text-default"><i class="fa fa-exclamation-triangle"></i> Not yet filled out</h3><?php
    }
    ?>
  </div>
</div>
<div class="card card-primary" id="costs">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-money-bill-wave"></i> Costs</h3>
  </div>
  <div class="card-body">
    <?php
    list($total_costs, $costs_exists) = CostRepository::print_costs($service-> get_id());
    if(!$costs_exists){
      ?><h3 id="no_costs" class="text-center text-default"><i class="fa fa-exclamation-triangle"></i> Not yet filled out</h3><?php
    }
    ?>
  </div>
</div>
<br>
<div class="container">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fas fa-money-bill-wave"></i> Total</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-6 text-center">
          <h4>TOTAL:</h4>
        </div>
        <div class="col-md-6 text-center">
          <h4>$ <?php echo $total_staff + $total_costs*1.05; ?></h4>
        </div>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="id_service" value="<?php echo $service-> get_id(); ?>">
<input type="hidden" name="total_service" value="<?php echo $total_staff + $total_costs*1.05; ?>">
<div class="card-footer footer">
  <a class="btn btn-primary" id="go_back" href="<?php echo INFO_PROJECT_AND_SERVICES . $project-> get_id() . '#services'; ?>"><i class="fa fa-reply"></i></a>
  <button type="submit" class="btn btn-success" name="save_edit_service"><i class="fa fa-check"></i> Save</button>
  <a class="btn  btn-info add_item_charter" href="<?php echo ADD_STAFF . $service-> get_id(); ?>"><i class="fa fa-plus"></i> Add staff</a>
  <a class="btn btn-primary" href="<?php echo ADD_COST . $service-> get_id(); ?>"><i class="fa fa-plus"></i> Add costs</a>
</div>
