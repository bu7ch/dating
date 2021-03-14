<?php 

include_once('params.inc.php');

$connex ='mysql:host='.HOST.';dbname='.DBHOST.'';
$user=USER;
$password=PASS;


function db_connect() {
  $connexion = new PDO($connex,$user,$password);
  confirm_db_connect($connexion);
  return $connexion;
}
function confirm_db_connect($connexion) {
  if($connexion->connect_errno) {
    $msg = "Database connection failed: ";
    $msg .= $connexion->connect_error;
    $msg .= " (" . $connexion->connect_errno . ")";
    exit($msg);
  }
}
?>