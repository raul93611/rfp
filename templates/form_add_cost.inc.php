<input type="hidden" name="id_service" value="<?php echo $id_service; ?>">
<div class="card-body">
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="description">Description:</label>
        <input type="text" class="form-control form-control-sm" id="description" name="description" autofocus required>
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="amount">Amount ($):</label>
        <input type="number" step=".01" class="form-control form-control-sm" id="amount" name="amount" required value="0">
      </div>
    </div>
  </div>
</div>
<div class="card-footer">
  <button type="submit" class="btn btn-success" name="save_cost"><i class="fa fa-check"></i> Save</button>
  <a class="btn btn-danger" href="<?php echo SERVICE . $id_service; ?>"><i class="fa fa-ban"></i> Cancel</a>
</div>
