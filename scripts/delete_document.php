<?php
session_start();
$file = str_replace('%20', ' ', $file);
$file = str_replace('%23', '#', $file);
//if(
  unlink($_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project . '/' . $file);/*){*/
  //Redirection::redirect(INFO_PROJECT_AND_SERVICES . $id_project);
//}
echo 0;
?>
