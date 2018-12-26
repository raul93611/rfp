<input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Proposal data</h3>
  </div>
  <div class="card-body">
    <?php
    foreach ($services as $i=>$service) {
      $a = $i + 1;
      ?>
      <div class="row">
        <div class="col-md-7">
          <div class="from-group">
            <label for="proposal_description">Description (Year <?php echo $a; ?>):</label>
            <textarea name="proposal_description<?php echo $service-> get_id(); ?>" rows="5" class="form-control form-control-sm"><?php echo $service-> get_description(); ?></textarea>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label for="proposal_quantity">Quantity:</label>
            <input type="number" name="proposal_quantity<?php echo $service-> get_id(); ?>" class="form-control form-control-sm" value="<?php echo $service-> get_quantity(); ?>">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="total_service_cost">Service cost ($):</label>
            <input type="number" step=".01" disabled class="form-control form-control-sm" value="<?php echo $service-> get_total(); ?>">
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <div class="card-footer footer">
    <a class="btn btn-primary" id="go_back" href="<?php echo INFO_PROJECT_AND_SERVICES . $id_project; ?>"><i class="fa fa-reply"></i></a>
    <button type="submit" class="btn btn-success" name="save_proposal_data"><i class="fa fa-check"></i> Save</button>
    <a  class="btn btn-info" target="_blank" href="<?php echo GENERATE_PROPOSAL . $id_project; ?>"><i class="fa fa-book"></i> Generate proposal</a>
  </div>
</div>
