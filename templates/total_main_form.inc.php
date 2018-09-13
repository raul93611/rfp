<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fas fa-tag"></i> Total:</h3>
  </div>
  <div class="card-body">
    <?php
    $quantity_years = $project-> get_quantity_years();
    $base_year = $total_staff + ($total_costs*1.05);
    $total_service = 0;
    $total_by_year = [];
    ?>
    <div class="row">
      <div class="col-2">

      </div>
      <div class="col-3">
        <?php
        for ($i = 1; $i <= $quantity_years ; $i++) {
          if($i == 1){
            ?><h3 class="text-primary">Services:</h3><?php
          }else{
            ?><h3 class="text-primary"></h3><?php
          }
        }
        ?>

      </div>
      <div class="col-3">
        <?php
        for ($i = 1; $i <= $quantity_years; $i++) {
          if($i == 1){
            ?><h3 class="text-primary">$ <?php echo number_format($base_year, 2); ?></h3><?php
          }else{
            $base_year *= 1.03;
            ?><h3 class="text-primary">$ <?php echo number_format($base_year, 2); ?></h3><?php
          }
          $total_by_year[] = $base_year;
          $total_service += $base_year;
        }
        $total_by_year = implode('|', $total_by_year);
        ?>

      </div>
      <div class="col-2">
        <?php
        for ($i = 1; $i <= $quantity_years; $i++) {
          if($i == 1){
            ?><h3 class="text-primary"><small>(Year <?php echo $i; ?>)</small></h3><?php
          }else{
            ?><h3 class="text-primary"><small>(Year <?php echo $i; ?>)</small></h3><?php
          }
        }
        ?>
      </div>
      <div class="col-2">

      </div>
    </div>
    <?php
    if($project-> get_type() == 'services_and_equipment'){
      ?>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-3">
          <h3 class="text-primary">Total:</h3>
          <h3 class="text-primary">Equipment:</h3>
        </div>
        <div class="col-3">
          <h3 class="text-primary">$ <?php echo number_format($total_service, 2); ?></h3>
          <h3 class="text-primary">$ <?php echo number_format($rfq_quote-> obtener_total_price(), 2); ?></h3>
        </div>
        <div class="col-2">

        </div>
        <div class="col-2">

        </div>
      </div>
      <?php
    }else{
      ?>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-3">
          <h3 class="text-primary">Total:</h3>
        </div>
        <div class="col-3">
          <h3 class="text-primary">$ <?php echo number_format($total_service, 2); ?></h3>
        </div>
        <div class="col-2">

        </div>
        <div class="col-2">

        </div>
      </div>
      <?php
    }
    ?>
    <hr>
    <?php
    if($project-> get_submitted() && $project-> get_follow_up() && !$project-> get_award()){
      ?>
      <div class="form-group">
        <label>
          <input type="checkbox" class="minimal" name="award" value="yes" id="award" <?php if($project-> get_award()){echo 'checked';} ?>>
          <span style="font-size: 20px;" class="text-primary">Award</span>
        </label>
      </div>
      <?php
    }else if($project-> get_submitted() && !$project-> get_follow_up() && !$project-> get_award()){
      ?>
      <div class="form-group">
        <label>
          <input type="checkbox" class="minimal" name="follow_up" value="yes" id="follow_up" <?php if($project-> get_follow_up()){echo 'checked';} ?>>
          <span style="font-size: 20px;" class="text-primary">Follow up</span>
        </label>
      </div>
      <?php
    }else if(!$project-> get_submitted() && !$project-> get_award()){
      ?>
      <div class="form-group">
        <label>
          <input type="checkbox" class="minimal" name="submitted" value="yes" id="submitted" <?php if($project-> get_submitted()){echo 'checked';} ?>>
          <span style="font-size: 20px;" class="text-primary">Submitted</span>
        </label>
      </div>
      <?php
    }
    ?>
  </div>
</div>
