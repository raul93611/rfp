<?php
Connection::open_connection();
$cost = CostRepository::get_cost_by_id(Connection::get_connection(), $id_cost);
$service = ServiceRepository::get_service_by_id(Connection::get_connection(), $cost-> get_id_service());
Connection::close_connection();
?>
<input type="hidden" name="id_cost" value="<?php echo $id_cost; ?>">
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control form-control-sm" id="description" name="description" autofocus required value="<?php echo $cost-> get_description(); ?>">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label for="amount">Amount ($):</label>
        <input type="number" step=".01" class="form-control form-control-sm" id="amount" name="amount" required value="<?php echo $cost-> get_amount(); ?>">
      </div>
    </div>
  </div>
</div>
<div class="card-footer">
  <button type="submit" class="btn btn-success" name="save_edit_cost"><i class="fa fa-check"></i> Save</button>
  <a class="btn btn-danger" href="<?php echo SERVICE . $service-> get_id(); ?>"><i class="fa fa-ban"></i> Cancel</a>
</div>
