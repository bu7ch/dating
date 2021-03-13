<?php 
include_once('params.inc.php');
// connexion serveur
$connex ='mysql:host='.HOST.';dbname='.DBHOST.'';
$user=USER;
$password=PASS;
 $connexion = new PDO($connex,$user,$password);
if(!$connexion) {
  echo "TU ES UNE GROSSE MERDASSE";
}
echo 'Connexion de BG !!!';

// TODO: OPTIMISATION
// FIXME: Faire une fonction pour la connexion