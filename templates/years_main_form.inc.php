<div id="services" class="card card-primary">
  <div class="card-header">
    <h3 class="d-inline card-title"><i class="fas fa-list-alt"></i> Services</h3>
    <span class="float-right"><a href="<?php echo ADD_SERVICE . $id_project; ?>" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></a></span>
  </div>
  <div class="card-body">
    <?php
    if(count($services)){
      ?>
      <div class="list-group">
        <?php
        foreach ($services as $i => $service) {
          $a = $i + 1;
          if(!$i){
            ?>
            <li class="list-group-item"><a href="<?php echo SERVICE . $service-> get_id(); ?>">Year <?php echo $a; ?></a> ($ <?php echo number_format($service-> get_total(), 2); ?>)</li>
            <?php
          }else {
            ?>
            <li class="list-group-item"><a href="<?php echo SERVICE . $service-> get_id(); ?>">Year <?php echo $a; ?></a> ($ <?php echo number_format($service-> get_total(), 2); ?>)<a href="<?php echo DELETE_SERVICE . $service-> get_id(); ?>" class="delete_document_button close"><span aria-hidden="true">&times;</span></a></li>
            <?php
          }
          $total_service += $service-> get_total();
        }
        ?>
      </div>
      <?php
    }else {
      ?>
      <h3 class="text-center text-default"><i class="fa fa-exclamation-triangle"></i> Not yet filled out</h3>
      <?php
    }
    ?>
    <br>
    <div class="container">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-money-bill-wave"></i> Total</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6 text-center">
              <h4>SERVICES:</h4>
              <?php
              if($project-> get_type() == 'services_and_equipment'){
                ?>
                <h4>EQUIPMENT:</h4>
                <?php
              }
              ?>
            </div>
            <div class="col-md-6 text-center">
              <h4>$ <?php echo number_format($total_service, 2); ?></h4>
              <?php
              if($project-> get_type() == 'services_and_equipment'){
                ?>
                <h4>$ <?php echo number_format($total_equipment, 2); ?></h4>
                <?php
              }
              ?>
            </div>
          </div>
          <div class="row">
            <?php
            if($project-> get_award()){

            }else if($project-> get_follow_up()){
              ?>
              <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="award" value="yes" id="award">
                  <label class="custom-control-label" for="award">Award</label>
                </div>
              </div>
              <?php
            }else if($project-> get_submitted()){
              ?>
              <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="follow_up" value="yes" id="follow_up">
                  <label class="custom-control-label" for="follow_up">Follow up</label>
                </div>
              </div>
              <?php
            }else{
              ?>
              <div class="col-md-12">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="submitted" value="yes" id="submitted">
                  <label class="custom-control-label" for="submitted">Submitted</label>
                </div>
              </div>
              <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="total_service" value="<?php echo $total_service; ?>">
    <input type="hidden" name="total_equipment" value="<?php echo $total_equipment; ?>">
  </div>
</div>
