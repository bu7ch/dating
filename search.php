<?php 
 require_once('initialize.php');
?>
<?php 
include_once('./shared/header.php');
?>

<h3>Le site des rencontres sportives</h3>
<form action="search.php" method="post">
  <fieldset>
    <legend> Rechercher des partenaires </legend>
    <table>
      <tbody>
        <tr>
          <td>Sport pratiqué :</td>
          <td>
            <select name="design" >
              <option value="NULL"> Choississez !</option>
              <?php 
              // Creation dynmique de la liste de sélection du sport
              //connexion
              $result = $connexion->query('select id_sport, design from sport');
              if ($result) {
                while($row=$result->fetch()) {
                  echo '<option value='.$row[0].'>'.$row[1].'</option>';
                }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Niveau : </td>
          <td>
          <select name="niveau">
            <option value="1">Débutant</option>
            <option value="2">Confirmé</option>
            <option value="3">Pro</option>
            <option value="4">Supporter</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>Département : </td>
          <td>
            <select name="depart" Choississez!>
            <option name="NULL" >Choississez!</option>
              <?php 
              // Creation dynmique de la liste de sélection du departement
              //connexion
              $result = $connexion->query('select depart from personne');
              if ($result) {
                while($row=$result->fetch()) {
                  $tabdepart[] = $row[0];
                }
                //Eviter les doublons
                $tabdepart = array_unique($tabdepart);
                sort($tabdepart);
                $count = count($tabdepart);
                for ($i=0; $i < $count; $i++) { 
                  echo "<option value=". $tabdepart[$i] . ">" . $tabdepart[$i] . "</option>";
                }
              } 
              ?>
            </select>
          </td>
        </tr>
          <tr>
            <td>
                <input type="submit" name="envoie" value="Recherche" />
            </td>
            <td>
                <input type="reset" name="efface" value="Effacer" />
            </td>
          </tr>
      </tbody>
    </table>
  </fieldset>
</form>
<?php 
if (isset($_POST['envoie'])) {
  if(!$connexion){ 
    echo 'Erreur : $erreur <br>';
  }
  else {
    $niveau =$_POST['niveau'];
    $design =$_POST['design'];
    $depart =$_POST['depart'];
    $req= "SELECT nom, prenom,mail, design FROM personne, pratique,sport WHERE 
    personne.id_personne = pratique.id_personne AND sport.id_sport = pratique.id_sport AND
    pratique.niveau = $niveau AND sport.id_sport = $design AND
    personne.depart = $depart";
    // $req= "SELECT nom, prenom,mail, design FROM personne, pratique,sport WHERE personne.id_personne = pratique.id_personne AND sport.id_sport = pratique.id_sport AND pratique.niveau = 2 AND sport.id_sport = 7 AND personne.depart = 974";
    $result = $connexion->query($req);
    echo "<table border=\"1\" rules=\"rows\" width=\"100%\">";
    echo "<tr><th colspan=\"3\"> Liste des partenaires disponibles </th>";

    while ($row = $result->fetch()){
      echo "<tr><td>" . $row['prenom'] . "</td><td>" . $row['nom'] ."</td><td>" . $row['mail'] ."</td></tr>";
    }
    echo "</table>";
  }
}

?>