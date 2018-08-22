<?php
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
Connection::close_connection();

if($project-> get_type() == 'services_and_equipment'){
  Conexion::abrir_conexion();
  $rfp_connection = RepositorioRfpConnection::obtener_rfp_connection_por_id_project(Conexion::obtener_conexion(), $id_project);
  Conexion::cerrar_conexion();
  $id_rfq = $rfp_connection-> obtener_id_rfq();
}

if($project-> get_start_date() != '0000-00-00'){
  $start_date = ProjectRepository::mysql_date_to_english_format($project-> get_start_date());
}else{
  $start_date = '';
}

if($project-> get_end_date() != '0000-00-00 00:00:00'){
  $end_date = ProjectRepository::mysql_datetime_to_english_format($project-> get_end_date());
}else{
  $end_date = '';
}
?>
<input type="hidden" name="id_project" id="id_project" value="<?php echo $id_project; ?>">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Links and documents</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <label>Link:</label><br>
      <span>
        <?php if($project-> get_link() != ''){
        ?>
        <a href="<?php echo $project-> get_link(); ?>" target="_blank"><?php echo $project-> get_link(); ?></a>
        <?php
        }else{
          ?>
          <h3 class="text-center text-danger"><i class="fa fa-times"></i> No link!</h3>
          <?php
        }
        ?>
      </span>
    </div>
    <div class="form-group">
      <label>Documents:</label>
      <?php
      $directory = $_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project;
      if (is_dir($directory)) {
          $manager = opendir($directory);
          echo '<div class="list-group">';
          $folder = @scandir($directory);
          if(count($folder) <= 2){
            echo '<h3 class="text-center text-danger"><i class="fa fa-times"></i> No files!</h3>';
          }
          while (($file = readdir($manager)) !== false) {
              $complete_directory = $directory . "/" . $file;
              if ($file != "." && $file != "..") {
                  $file_url = str_replace(' ', '%20', $file);
                  echo '<li class="list-group-item"><a download href="' . DOCS . $id_project . '/' . $file_url . '">' . $file . '</a><a href="' . DELETE_DOCUMENT . $id_project . '/' . $file . '" class="close"><span aria-hidden="true">&times;</span></a></li>';
              }
          }
          closedir($manager);
          echo "</div>";
      }
      ?>
    </div>
    <div class="form-group">
      <label for="documents">Upload documents:</label><br>
      <input type="file" id="documents" name="documents[]" class="btn btn-block btn-secondary" multiple>
    </div>
  </div>
</div>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Main information</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col">
        <div class="form-group">
          <?php
          Connection::open_connection();
          $users = UserRepository::get_users_3_4(Connection::get_connection());
          Connection::close_connection();
          ?>
          <?php
          if (count($users)) {
            ?>
            <label for="designated_user">Designated user:</label>
            <select id="designated_user" disabled class="form-control" name="designated_user">
            <?php
            foreach ($users as $user) {
              ?>
              <option value="<?php echo $user-> get_id(); ?>" <?php if ($user-> get_id() == $project-> get_designated_user()) {echo 'selected';}?>><?php echo $user-> get_username(); ?></option>
              <?php
              }
              ?>
            </select>
            <?php
          }
          ?>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="code">Code:</label>
          <input type="text" name="code" id="code" class="form-control" value="<?php echo $project-> get_code(); ?>" placeholder="Code ..." autofocus>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="project_name">Name:</label>
          <input class="form-control" type="text" id="project_name" name="project_name" placeholder="Project name ..." autofocus required value="<?php echo $project-> get_project_name(); ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <label for="start_date">Start date:</label>
          <input class="form-control" type="text" id="start_date" readonly name="start_date" required value="<?php echo $start_date; ?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="end_date">End date:</label>
          <input class="form-control" type="text" id="end_date" name="end_date" required value="<?php echo $end_date; ?>">
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="priority">Priority:</label>
          <select class="form-control" name="priority" id="priority">
            <option value="8a" <?php if($project-> get_priority() == '8a'){echo 'selected';} ?>>8(a)</option>
            <option value="hubzone" <?php if($project-> get_priority() == 'hubzone'){echo 'selected';} ?>>HUBZone</option>
            <option value="small_business" <?php if($project-> get_priority() == 'small_business'){echo 'selected';} ?>>Small Business</option>
            <option value="full_and_open" <?php if($project-> get_priority() == 'full_and_open'){echo 'selected';} ?>>Full and Open</option>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="type">Type:</label>
          <select class="form-control" name="type" id="type">
            <option value="services" <?php if($project-> get_type() == 'services'){echo 'selected';} ?>>Services</option>
            <option value="services_and_equipment" <?php if($project-> get_type() == 'services_and_equipment'){echo 'selected';} ?>>Services and equipment</option>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="form-group">
          <label for="submission_instructions">Submission instructions:</label>
          <select class="form-control" name="submission_instructions" id="submission_instructions">
            <option value="email" <?php if($project-> get_submission_instructions() == 'email'){echo 'selected';} ?>>E-mail</option>
            <option value="mail" <?php if($project-> get_submission_instructions() == 'mail'){echo 'selected';} ?>>Mail</option>
            <option value="gsa" <?php if($project-> get_submission_instructions() == 'gsa'){echo 'selected';} ?>>GSA</option>
            <option value="fedbid" <?php if($project-> get_submission_instructions() == 'fedbid'){echo 'selected';} ?>>FedBid</option>
            <option value="seaport" <?php if($project-> get_submission_instructions() == 'seaport'){echo 'selected';} ?>>SeaPort</option>
            <option value="others" <?php if($project-> get_submission_instructions() == 'others'){echo 'selected';} ?>>Others</option>
          </select>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" name="description" id="description" rows="10"><?php echo $project-> get_description(); ?></textarea>
    </div>
  </div>
</div>
<?php
if($project-> get_type() == 'services_and_equipment'){
  Conexion::abrir_conexion();
  $rfq_quote = RepositorioRfq::obtener_cotizacion_por_id(Conexion::obtener_conexion(), $id_rfq);
  $designated_user_rfq_quote = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $rfq_quote-> obtener_usuario_designado());
  $items = RepositorioItem::obtener_items_por_id_rfq(Conexion::obtener_conexion(), $id_rfq);
  Conexion::cerrar_conexion();
  ?>
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title"><i class="fa fa-plus"></i> Equipment</h3>
    </div>
    <div class="card-body">
      <?php
      if($rfq_quote-> obtener_completado()){
        ?>
        <a href="#" id="report_error_button" class="float-right btn btn-warning"><i class="fa fa-exclamation-triangle"></i> Report error</a><br><br>
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>SHIP VIA</th>
              <th>CONTRACT NUMBER</th>
              <th>SALES REP</th>
              <th>E-MAIL</th>
              <th>PAYMENT TERMS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $rfq_quote-> obtener_ship_via(); ?></td>
              <td><?php echo $rfq_quote-> obtener_email_code(); ?></td>
              <td><?php echo $designated_user_rfq_quote-> obtener_nombres() . ' ' . $designated_user_rfq_quote-> obtener_apellidos(); ?></td>
              <td><?php echo $designated_user_rfq_quote-> obtener_email(); ?></td>
              <td><?php echo $rfq_quote-> obtener_payment_terms(); ?></td>
            </tr>
          </tbody>
        </table>
        <br>
        <table id="items_table" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th id="numeration">#</th>
              <th>DESCRIPTION</th>
              <th class="quantity">QTY</th>
              <th>UNIT PRICE</th>
              <th class="total_ancho">TOTAL</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $a = 1;
            for ($i = 0; $i < count($items); $i++) {
              $item = $items[$i];
              ?>
              <tr>
                <td><?php echo $a; ?></td>
                <td><b>Brand name:</b><?php echo $item->obtener_brand(); ?><br><b>Part number:</b><?php echo $item->obtener_part_number(); ?><br><b> Item description:</b><br><?php echo nl2br($item->obtener_description()); ?></td>
                <td><?php echo $item->obtener_quantity(); ?></td>
                <td>$ <?php echo number_format($item->obtener_unit_price(), 2); ?></td>
                <td>$ <?php echo number_format($item->obtener_total_price(), 2); ?></td>
              </tr>
              <?php
              Conexion::abrir_conexion();
              $subitems = RepositorioSubitem::obtener_subitems_por_id_item(Conexion::obtener_conexion(), $item-> obtener_id());
              Conexion::cerrar_conexion();
              for($j = 0; $j < count($subitems); $j++){
                $subitem = $subitems[$j];
                ?>
                <tr>
                  <td></td>
                  <td><b>Brand name:</b><?php echo $subitem-> obtener_brand(); ?><br><b>Part number:</b><?php echo $subitem-> obtener_part_number(); ?><br><b>Item description:</b><br><?php echo nl2br($subitem-> obtener_description()); ?></td>
                  <td><?php echo $subitem-> obtener_quantity(); ?></td>
                  <td>$ <?php echo number_format($subitem-> obtener_unit_price(), 2); ?></td>
                  <td>$ <?php echo number_format($subitem-> obtener_total_price(), 2); ?></td>
                </tr>
                <?php
              }
              $a++;
            }
            ?>
            <tr>
              <td></td>
              <td><?php echo nl2br($rfq_quote-> obtener_shipping()); ?></td>
              <td></td>
              <td></td>
              <td>$ <?php echo number_format($rfq_quote-> obtener_shipping_cost(), 2); ?></td>
            </tr>
            <tr>
              <td></td>
              <td>TOTAL:</td>
              <td></td>
              <td></td>
              <td>$ <?php echo number_format($rfq_quote-> obtener_total_price(), 2); ?></td>
            </tr>
          </tbody>
        </table>
        <?php
      }else{
        ?><h3 class="text-center text-danger"><i class="fa fa-times"></i> Quote is not completed!</h3><?php
      }
      ?>
    </div>
  </div>
  <?php
}
?>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Staff</h3>
  </div>
  <div class="card-body">
    <?php
    if($project-> get_submission_instructions() == 'gsa'){
      $gsa = '1';
    }else{
      $gsa = '0';
    }
    Connection::open_connection();
    $service = ServiceRepository::get_service_by_id_project(Connection::get_connection(), $id_project);
    list($total_staff, $staff_exists) = StaffRepository::print_all_staff($service-> get_id(), $gsa);
    Connection::close_connection();
    if(!$staff_exists){
      ?><h3 class="text-center text-warning"><i class="fa fa-exclamation-triangle"></i> Not yet filled out</h3><?php
    }
    ?>
  </div>
</div>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Costs</h3>
  </div>
  <div class="card-body">
    <?php
    list($total_costs, $costs_exists) = CostRepository::print_costs($service-> get_id());
    if(!$costs_exists){
      ?><h3 class="text-center text-warning"><i class="fa fa-exclamation-triangle"></i> Not yet filled out</h3><?php
    }
    ?>
  </div>
</div>
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Total:</h3>
  </div>
  <div class="card-body">
    <?php
    if($project-> get_type() == 'services_and_equipment'){
      $total_equipment = number_format($rfq_quote-> obtener_total_price(), 2);
      $total_service = $total_staff + $total_costs;
      $total = $rfq_quote-> obtener_total_price() + $total_service;
      ?>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-4">
          <h3 class="text-info">Services:</h3>
          <h3 class="text-info">Equipment:</h3>
          <h3 class="text-info">Total:</h3>
        </div>
        <div class="col-4">
          <h3 class="text-info">$ <?php echo number_format($total_service, 2); ?></h3>
          <h3 class="text-info">$ <?php echo $total_equipment; ?></h3>
          <h3 class="text-info">$ <?php echo number_format($total, 2); ?></h3>
        </div>
        <div class="col-2">

        </div>
      </div>
      <?php
    }else{
      $total_service = $total_staff + $total_costs;
      ?>
      <div class="row">
        <div class="col-2">

        </div>
        <div class="col-4">
          <h3 class="text-info">Services:</h3>
        </div>
        <div class="col-4">
          <h3 class="text-center text-info">$ <?php echo number_format($total_service, 2); ?></h3>
        </div>
        <div class="col-2">

        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
<input type="hidden" name="total_service" value="<?php echo $total_service; ?>">
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-plus"></i> Comments</h3>
  </div>
  <div class="card-body">
    <div class="form-group">
      <textarea class="form-control" name="story_comments" rows="5"></textarea>
    </div>
  </div>
</div>
<div class="card-footer footer">
  <a class="btn btn-primary" id="go_back" href="<?php echo PROFILE; ?>"><i class="fa fa-reply"></i></a>
  <button type="submit" class="btn btn-success" name="save_info_project_and_services"><i class="fa fa-check"></i> Save</button>
  <a class="btn btn-info" href="<?php echo FLOWCHART . $id_project; ?>"><i class="fa fa-book"></i> Flowchart</a>
  <a class="btn btn-info" href="<?php echo ADD_STAFF . $id_project; ?>"><i class="fa fa-plus"></i> Add staff</a>
  <a class="btn btn-info" href="<?php echo ADD_COST . $id_project; ?>"><i class="fa fa-plus"></i> Add costs</a>
</div>
</div>
