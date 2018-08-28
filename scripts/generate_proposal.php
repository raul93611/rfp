<?php
session_start();
include_once 'vendor/autoload.php';
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
Connection::close_connection();
Conexion::abrir_conexion();
//$rfp_connection = RepositorioRfpConnection::obtener_rfp_connection_por_id_project(Conexion::obtener_conexion(), $id_project);
//$cotizacion = RepositorioRfq::obtener_cotizacion_por_id(Conexion::obtener_conexion(), $rfp_connection-> obtener_id_rfq());
//$usuario_designado = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $cotizacion->obtener_usuario_designado());
//$items = RepositorioItem::obtener_items_por_id_rfq(Conexion::obtener_conexion(), $id_rfq);
Conexion::cerrar_conexion();
$quantity_years = $project-> get_quantity_years();
$proposal_description = explode('|', $project-> get_proposal_description());
$proposal_quantity = explode('|', $project-> get_proposal_quantity());
$proposal_amount = explode('|', $project-> get_proposal_amount());
try{
  $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
  $fontDirs = $defaultConfig['fontDir'];
  $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
  $fontData = $defaultFontConfig['fontdata'];
  $mpdf = new \Mpdf\Mpdf(['format' => 'Letter', 'margin_footer' => '8',
  'fontDir' => array_merge($fontDirs, [
          SERVIDOR . '/vendor/mpdf/mpdf/ttfonts',
      ]),
      'fontdata' => $fontData + [
          'roboto' => [
              'R' => 'Roboto-Regular.ttf',
              'I' => 'Roboto-Italic.ttf',
          ]
      ],
      'default_font' => 'roboto'
  ]);
  $html = '<!DOCTYPE html>
  <html>
  <head>
  <style>
  body{
      font-family: roboto;

  }
  th{
      color: #004A97;
      background-color: #DEE8F2;
  }
  #tabla th,#tabla td {
      border: 1px solid #DEE8F2;

      padding-left: 10px;
      padding-right: 10px;
      padding-top: 5px;
      padding-bottom: 5px;
      font-size: 9pt;
  }
  table, th, td{
      border-collapse: collapse;
  }
  td{
      color: #3B3B3B;
  }

  .quantity{
      width: 20px;
  }

  .total_ancho{
    width: 130px;
  }

  .letra_chiquita{
      font-size: 8pt;
  }

  .color{
      color: #004A97;
  }
  .letra_grande{
    font-size: 25pt;
  }
  </style>
  </head>';
  $html .= '<body>
  <table border=0 width="100%">
    <tr>
      <td width="400">
      <img style="width:350px;height:130px;" src="' . IMG . '/logo_proposal.jpg">
      </td>
      <td align="right">
        <span class="color letra_grande">PROPOSAL</span>
        <br><br>
        <table id="tabla">
          <tr>
            <th>PROPOSAL #</th>
            <th>DATE</th>
            <th>EXPIRATION DATE</th>
          </tr>
          <tr>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
            <td style="text-align:center;"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <div >
  </div>';
  $html .= '
  <br>
  <table id="tabla" style="width:100%">
    <tr>
      <th style="width:50%">ADDRESS</th>
      <th style="width:50%">SHIP TO</th>
    </tr>
    <tr>
      <td></td>
      <td></td>
    </tr>
  </table>
  <br>
  <table id="tabla" style="width:100%">
    <tr>
      <th>SHIP VIA</th>
      <th>CONTRACT NUMBER</th>
      <th>SALES REP</th>
      <th>E-MAIL</th>
      <th>PAYMENT TERMS</th>
    </tr>
    <tr>
      <td style="text-align:center;"></td>
      <td style="text-align:center;"></td>
      <td style="text-align:center;"></td>
          <td style="text-align:center;"></td>
      <td style="text-align:center;"></td>
    </tr>
  </table><br>';
          $html .= '<table id="tabla" style="width:100%">
          <tr>
            <th class="quantity">#</th>
            <th>DESCRIPTION</th>
            <th class="quantity">QTY</th>
            <th>UNIT PRICE</th>
            <th class="total_ancho">TOTAL</th>
          </tr>';
      $a = 1;
      for ($i = 1; $i <= $quantity_years; $i++) {
            $html .= '<tr>
                <td>' . $a . '</td>
                <td>' . $proposal_description[$i - 1] . '</td>
                <td>' . $proposal_quantity[$i - 1] . '</td>
                <td>' . $proposal_amount[$i - 1] . '</td>
                <td>' . $proposal_amount[$i - 1] . '</td>
              </tr>';

            $a++;
            }
      $html .= '</table>';
  $html .= '</body></html>';
  $mpdf->WriteHTML($html);
  //$mpdf->Output($_SERVER['DOCUMENT_ROOT'] . '/rfq/documentos/' . $cotizacion->obtener_id() . '/' . str_replace('/', ' ', $cotizacion->obtener_email_code()) . '.pdf', 'F');
  $mpdf->Output(str_replace('/', ' ', 'hola') . '.pdf', 'I');
} catch (\Mpdf\MpdfException $e) {
    echo $e->getMessage();
}
?>
