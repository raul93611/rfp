<?php
if($project-> get_submitted()){
  ?>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-plus"></i> Results</h3>
    </div>
    <div class="card-body">
      <div class="form-group row">
        <label class="col-sm-2 col-form-label col-form-label-sm" for="result">Result:</label>
        <div class="col-sm-10">
          <select class="form-control form-control-sm" name="result" id="result">
            <option value="none" <?php if($project-> get_result() == 'none'){echo 'selected';} ?>>None</option>
            <option value="cancelled" <?php if($project-> get_result() == 'cancelled'){echo 'selected';} ?>>Cancelled</option>
            <option value="disqualified" <?php if($project-> get_result() == 'disqualified'){echo 'selected';} ?>>Disqualified</option>
            <option value="loss" <?php if($project-> get_result() == 'loss'){echo 'selected';} ?>>Loss</option>
            <option value="re_posted" <?php if($project-> get_result() == 're_posted'){echo 'selected';} ?>>Re-posted</option>
            <option value="to_be_determined" <?php if($project-> get_result() == 'to_be_determined'){echo 'selected';} ?>>To be determined</option>
          </select>
        </div>
      </div>
      <div class="form-group row" id="proposed_price">
        <label class="col-sm-2 col-form-label col-form-label-sm" for="proposed_price">Proposed price:</label>
        <div class="col-sm-10">
          <input type="number" step=".01" class="form-control form-control-sm" name="proposed_price" value="<?php echo $project-> get_proposed_price(); ?>">
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>
