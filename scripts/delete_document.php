<?php
$file = str_replace('%20', ' ', $file);
if(unlink($_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project . '/' . $file)){
  Redirection::redirect1(INFO_PROJECT . $id_project);
}
?>
