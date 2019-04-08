<?php
session_start();
header('Content-Type: application/json');
$file = str_replace('%20', ' ', $file);
$file = str_replace('%23', '#', $file);
//if(
  unlink($_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project . '/' . $file);/*){*/
  //Redirection::redirect(INFO_PROJECT_AND_SERVICES . $id_project);
//}
echo json_encode(array(
  'result'=> '1'
));
?>
