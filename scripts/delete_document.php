<?php
$file = str_replace('%20', ' ', $file);
$file = str_replace('%23', '#', $file);
if(unlink($_SERVER['DOCUMENT_ROOT'] . '/rfp/documents/' . $id_project . '/' . $file)){
  Redirection::redirect1(INFO_PROJECT . $id_project);
}
?>