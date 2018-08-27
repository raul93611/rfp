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
            <label for="proposal_description">Description:</label>
            <textarea name="proposal_description" rows="5" id="proposal_description" class="form-control"><?php echo $project-> get_proposal_description(); ?></textarea>
          </div>
        </div>
        <div class="col-2">
          <div class="form-group">
            <label for="proposal_quantity">Quantity:</label>
            <input type="number" name="proposal_quantity" value="<?php echo $project-> get_proposal_quantity(); ?>">
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="total_service_cost">Service cost:</label>
            <input type="number" step=".01" name="service_cost" value="<?php echo $service-> get_total(); ?>">
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
