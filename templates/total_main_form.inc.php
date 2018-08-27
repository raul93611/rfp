<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Total:</h3>
  </div>
  <div class="card-body">
    <?php
    $quantity_years = $project-> get_quantity_years();
    if($project-> get_type() == 'services_and_equipment'){
      $total_equipment = number_format($rfq_quote-> obtener_total_price(), 2);
      $base_year = $total_staff + ($total_costs*1.05);
      ?>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-3">
          <?php
          for ($i = 1; $i <= $quantity_years ; $i++) {
            if($i == 1){
              ?><h3 class="text-info">Services:</h3><?php
            }else{
              ?><h3 class="text-info"></h3><?php
            }
          }
          ?>

        </div>
        <div class="col-3">
          <?php
          $total_service = 0;
          for ($i = 1; $i <= $quantity_years; $i++) {
            if($i == 1){
              ?><h3 class="text-info">$ <?php echo number_format($base_year, 2); ?></h3><?php
            }else{
              $base_year *= 1.03;
              ?><h3 class="text-info">$ <?php echo number_format($base_year, 2); ?></h3><?php
            }

            $total_service += $base_year;
          }
          ?>

        </div>
        <div class="col-2">
          <?php
          for ($i = 1; $i <= $quantity_years; $i++) {
            if($i == 1){
              ?><h3 class="text-info"><small>(Year <?php echo $i; ?>)</small></h3><?php
            }else{
              ?><h3 class="text-info"><small>(Year <?php echo $i; ?>)</small></h3><?php
            }
          }
          ?>
        </div>
        <div class="col-2">

        </div>
      </div>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-3">
          <h3 class="text-info">Total:</h3>
          <h3 class="text-info">Equipment:</h3>
        </div>
        <div class="col-3">
          <h3 class="text-info">$ <?php echo number_format($total_service, 2); ?></h3>
          <h3 class="text-info">$ <?php echo $total_equipment; ?></h3>
        </div>
        <div class="col-2">

        </div>
        <div class="col-2">

        </div>
      </div>
      <?php
    }else{
      $base_year = $total_staff + $total_costs*1.05;
      ?>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-3">
          <?php
          for ($i = 1; $i <= $quantity_years ; $i++) {
            if($i == 1){
              ?><h3 class="text-info">Services:</h3><?php
            }else{
              ?><h3 class="text-info"></h3><?php
            }
          }
          ?>
        </div>
        <div class="col-3">
          <?php
          $total_service = 0;
          for ($i = 1; $i <= $quantity_years; $i++) {
            if($i == 1){
              ?><h3 class="text-info">$ <?php echo number_format($base_year, 2); ?></h3><?php
            }else{
              $base_year *= 1.03;
              ?><h3 class="text-info">$ <?php echo number_format($base_year, 2); ?></h3><?php
            }

            $total_service += $base_year;
          }
          ?>

        </div>
        <div class="col-2">
          <?php
          for ($i = 1; $i <= $quantity_years; $i++) {
            if($i == 1){
              ?><h3 class="text-info"><small>(Year <?php echo $i; ?>)</small></h3><?php
            }else{
              ?><h3 class="text-info"><small>(Year <?php echo $i; ?>)</small></h3><?php
            }
          }
          ?>
        </div>
        <div class="col-2">

        </div>
      </div>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-3">
          <h3 class="text-info">Total:</h3>
        </div>
        <div class="col-3">
          <h3 class="text-info">$ <?php echo number_format($total_service, 2); ?></h3>
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
    if($project-> get_submitted() && !$project-> get_award()){
      ?>
      <div class="form-group">
        <label>
          <input type="checkbox" class="minimal" name="award" value="yes" id="award" <?php if($project-> get_award()){echo 'checked';} ?>>
          <span style="font-size: 20px;" class="text-primary">Award</span>
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
