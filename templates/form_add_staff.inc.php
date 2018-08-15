<input type="hidden" name="id_project" value="<?php echo $id_project; ?>">
<div class="card-body">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name="name" id="name"  autofocus required>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="rate">Rate (%):</label>
        <input type="number" step=".01" class="form-control" id="rate" name="rate" required value="0">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="office_expenses">Office expenses ($):</label>
        <input type="number" step=".01" class="form-control" id="office_expenses" name="office_expenses" required value="0">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="hourly_rate">Hourly rate ($):</label>
        <input type="number" step=".01" class="form-control" id="hourly_rate" name="hourly_rate" required value="0">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="hours_project"> Hours project (Hrs.):</label>
        <input type="number" class="form-control" id="hours_project" name="hours_project" required value="0">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="form-group">
        <label for="burdened_rate">Burdened rate ($):</label>
        <input type="text" class="form-control" readonly id="burdened_rate" name="burdened_rate">
      </div>
      <div class="form-group">
        <label for="total_burdened_rate">Total burdened rate ($):</label>
        <input type="text" class="form-control" readonly id="total_burdened_rate" name="total_burdened_rate">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="fblr">FBLR ($):</label>
        <input type="text" class="form-control" readonly id="fblr" name="fblr">
      </div>
      <div class="form-group">
        <label for="total_fblr">Total FBLR($):</label>
        <input type="text" class="form-control" readonly id="total_fblr" name="total_fblr">
      </div>
    </div>
  </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-success" name="save_staff"><i class="fa fa-check"></i> Save</button>
    <a class="btn btn-danger" href="<?php echo INFO_PROJECT_AND_SERVICES . $id_project; ?>"><i class="fa fa-ban"></i> Cancel</a>
</div>
