<?php
if($project-> get_submitted()){
  ?>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-plus"></i> Results</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label for="result">Result:</label>
        <select class="form-control" name="result" id="result">
          <option value="none" <?php if($project-> get_result() == 'none'){echo 'selected';} ?>>None</option>
          <option value="cancelled" <?php if($project-> get_result() == 'cancelled'){echo 'selected';} ?>>Cancelled</option>
          <option value="disqualified" <?php if($project-> get_result() == 'disqualified'){echo 'selected';} ?>>Disqualified</option>
          <option value="loss" <?php if($project-> get_result() == 'loss'){echo 'selected';} ?>>Loss</option>
          <option value="re_posted" <?php if($project-> get_result() == 're_posted'){echo 'selected';} ?>>Re-posted</option>
        </select>
      </div>
      <div class="form-group" id="proposed_price">
        <label for="proposed_price">Proposed price:</label>
        <input type="number" step=".01" class="form-control" name="proposed_price" value="<?php echo $project-> get_proposed_price(); ?>">
      </div>
    </div>
  </div>
  <?php
}
?>