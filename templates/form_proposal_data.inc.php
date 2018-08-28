<input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Proposal data</h3>
  </div>
  <div class="card-body">
    <?php
    $quantity_years = $project-> get_quantity_years();
    for ($i = 1; $i <= $quantity_years ; $i++) {
      ?>
      <div class="row">
        <div class="col-7">
          <div class="from-group">
            <label for="proposal_description">Description (Year <?php echo $i; ?>):</label>
            <textarea name="proposal_description<?php echo $i; ?>" rows="5" class="form-control"><?php echo $proposal_description[$i - 1]; ?></textarea>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group">
            <label for="proposal_quantity">Quantity:</label>
            <input type="number" name="proposal_quantity<?php echo $i; ?>" class="form-control" value="<?php echo $proposal_quantity[$i - 1]; ?>">
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="total_service_cost">Service cost ($):</label>
            <input type="number" step=".01" name="proposal_amount<?php echo $i; ?>" class="form-control" value="<?php $number = number_format($proposal_amount[$i-1], 2, '.', '');echo $number; ?>">
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
