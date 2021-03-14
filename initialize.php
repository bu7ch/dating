<?php 
require_once('params.inc.php');
//require('db_functions.php');
// connexion serveur

$connex ='mysql:host='.HOST.';dbname='.DBHOST.'';
$user=USER;
$password=PASS;

$connexion = new PDO($connex,$user,$password);
  confirm_db_connect($connexion);

  function confirm_db_connect($connexion) {
    if($connexion->connect_errno) {
      $msg = "Database connection failed: ";
      $msg .= $connexion->connect_error;
      $msg .= " (" . $connexion->connect_errno . ")";
      exit($msg);
    }
  }


// TODO: Optimisation pour la refacto
