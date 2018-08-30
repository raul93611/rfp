<?php
if($project-> get_type() == 'services_and_equipment'){
  ?>
  <div class="card card-primary" id="items">
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
