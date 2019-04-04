<?php
session_start();
include_once 'vendor/autoload.php';
Connection::open_connection();
$project = ProjectRepository::get_project_by_id(Connection::get_connection(), $id_project);
$services = ServiceRepository::get_services_by_id_project(Connection::get_connection(), $id_project);
$user = UserRepository::get_user_by_id(Connection::get_connection(), $project-> get_designated_user());
Connection::close_connection();
$submitted_date = ProjectRepository::mysql_date_to_english_format($project-> get_submitted_date());
$expiration_date = ProjectRepository::mysql_date_to_english_format($project-> get_expiration_date());
try{
  $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
  $fontDirs = $defaultConfig['fontDir'];
  $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
  $fontData = $defaultFontConfig['fontdata'];
  $mpdf = new \Mpdf\Mpdf(['format' => 'Letter', 'margin_footer' => '8',
  'fontDir' => array_merge($fontDirs, [
          SERVER . '/vendor/mpdf/mpdf/ttfonts',
      ]),
      'fontdata' => $fontData + [
          'roboto' => [
              'R' => 'Roboto-Regular.ttf',
              'I' => 'Roboto-Italic.ttf',
          ]
      ],
      'default_font' => 'roboto'
  ]);
  $html = '
  <!DOCTYPE html>
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
          width: 135px;
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
    </head>
  ';
  $html .= '
  <body>
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
              <td style="text-align:center;">RFP' . $project-> get_id() . '</td>
              <td style="text-align:center;">' . $submitted_date . '</td>
              <td style="text-align:center;">' . $expiration_date . '</td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  ';
  $html .= '
  <br>
  <table id="tabla" style="width:100%">
    <tr>
      <th style="width:50%">ADDRESS</th>
      <th style="width:50%">SHIP TO</th>
    </tr>
    <tr>
      <td>' . nl2br($project-> get_address()) . '</td>
      <td>' . nl2br($project-> get_ship_to()) . '</td>
    </tr>
  </table>
  <br>
  <table id="tabla" style="width:100%">
    <tr>
  ';
  $html .='
    <th>CONTRACT NUMBER</th>
    <th>SALES REP</th>
    <th>E-MAIL</th>
  </tr>
  <tr>
  ';
  $html .='
      <td style="text-align:center;">' . $project-> get_code() . '</td>
      <td style="text-align:center;">' . $user-> get_names() . ' ' . $user-> get_last_names() . '</td>
      <td style="text-align:center;">' . $user-> get_email() . '</td>
    </tr>
  </table>
  <br>
  ';
  $html .= '
  <table id="tabla" style="width:100%">
    <tr>
      <th class="quantity">#</th>
      <th>DESCRIPTION</th>
      <th class="quantity">QTY</th>
      <th>UNIT PRICE</th>
      <th class="total_ancho">TOTAL</th>
    </tr>
  ';
  $a = 1;
  for ($i = 1; $i <= count($services); $i++) {
    $service = $services[$i - 1];
    $html .= '
    <tr>
      <td>' . $a . '</td>
      <td>' . nl2br($service-> get_description()) . '</td>
      <td style="text-align:right;">' . $service-> get_quantity() . '</td>
      <td style="text-align:right;">$ ' . number_format($service-> get_total(), 2) . '</td>
      <td style="text-align:right;">$ ' . number_format($service-> get_total(), 2) . '</td>
    </tr>
    ';
    $a++;
  }
  $html .= '
  <tr>
    <td style="border:none;"></td>
    <td style="border:none;"></td>
    <td style="border:none;"></td>
    <td style="font-size:12pt;">TOTAL:</td>
    <td style="font-size:12pt;text-align:right;">$ ' . number_format($project-> get_total_service(), 2) . '</td>
  </tr>
  ';
  $html .= '</table>';
  $html .= '</body></html>';
  $mpdf->WriteHTML($html);
  $mpdf->Output($_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $project-> get_id() . '/' . str_replace('/', ' ', $project-> get_code()) . '(proposal_services).pdf', 'F');
  $mpdf->Output(preg_replace('/[^a-z0-9-_\-\.]/i','_', $project-> get_code()) . '(proposal_services).pdf', 'I');
} catch (\Mpdf\MpdfException $e) {
  echo $e->getMessage();
}
?>
