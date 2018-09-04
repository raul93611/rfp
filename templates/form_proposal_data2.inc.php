<input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Proposal data</h3>
  </div>
  <div class="card-body">
    <?php
    for ($i = 1; $i <= count($staff) ; $i++) {
      $single_staff = $staff[$i - 1];
      if($gsa){
        $service_cost = $single_staff-> get_total_fblr() + $single_cost_proposal;
      }else{
        $service_cost = $single_staff-> get_total_burdened_rate() + $single_cost_proposal;
      }
      ?>
      <div class="row">
        <div class="col-7">
          <div class="from-group">
            <label for="proposal_description">Description (<?php echo $single_staff-> get_name(); ?>):</label>
            <textarea name="proposal_description<?php echo $i; ?>" rows="5" class="form-control form-control-sm"><?php echo $proposal_description[$i - 1]; ?></textarea>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group">
            <label for="proposal_quantity">Quantity (Hrs.):</label>
            <input type="number" readonly name="proposal_quantity<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo $single_staff-> get_hours_project(); ?>">
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="total_service_cost">Service cost ($):</label>
            <input type="number" step=".01" readonly name="proposal_amount<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo $service_cost; ?>">
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
  <div class="card-footer footer">
    <a class="btn btn-primary" id="go_back" href="<?php echo INFO_PROJECT_AND_SERVICES . $id_project; ?>"><i class="fa fa-reply"></i></a>
    <button type="submit" class="btn btn-success" name="save_proposal_data2"><i class="fa fa-check"></i> Save</button>
    <a  class="btn btn-info" target="_blank" href="<?php echo GENERATE_PROPOSAL . $id_project; ?>"><i class="fa fa-book"></i> Generate proposal</a>
  </div>
</div>
