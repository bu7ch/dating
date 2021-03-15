<?php 
 require_once('initialize.php');
?>
<?php 
include_once('./shared/header.php');
?>

<h3>Le site des rencontres sportives</h3>
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
            <select name="NULL" >Choississez!</select>
              <?php 
              // Creation dynmique de la liste de sélection du departement
              //connexion
              $result = $connexion->query('select depart from personne');
              if ($result) {
                while($row=$result->fetchAll()) {
                  $tabdepart[] = $row[0];
                }
                //Eviter les doublons
                $tabdepart = array_unique($tabdepart);
                sort($tabdepart);
                for ($i=0; $i < count($tabdepart); $i++) { 
                  echo '<option value='.$tabdepart[$i].'>'.$tabdepart[$i].'</option>';
                }
              } 
              ?>
            </select>
          </td>
        </tr>
        <td>
              <input type="submit" name="envoie" value="Recherche" />
        </td>
        <td>
              <input type="reset" name="efface" value="Effacer" />
        </td>
    </tbody>
  </table>
</fieldset>
<?php 
var_dump($tabdepart);
?>