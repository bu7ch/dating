<?php 
// require_once('./initialze.php');
include_once('./shared/header.php');
?>

<form action="ajout.php" method="post">
  <fieldset>
    <legend> Vos Coordonnées</legend>
    <table>
      <tbody>
        <tr>
          <td>Nom:</td>
          <td> 
            <input type="text" name="nom" size="30"/>
          </td>
        </tr>
        <tr>
          <td>Prénom:</td>
          <td> 
            <input type="text" name="prenom" size="30"/>
          </td>
        </tr>
        <tr>
          <td>Département:</td>
          <td> 
            <input type="text" name="depart" size="30"/>
          </td>
        </tr>
        <tr>
          <td>Mail:</td>
          <td> 
            <input type="mail" name="mail" size="30"/>
          </td>
        </tr>
      </tbody>
    </table>
  </fieldset>
  <fieldset>
    <legend>Vos pratiques sportives</legend>
    <table>
      <tbody>
        <tr>
          <td>Sport pratiqué: </td>
          <td>
            <select name="design">
              <option value="NULL"> Choississez le sport !</option>
              <?php 
              // Creation dynamique de la liste de sélection
              // connexion
               $connexion = new PDO('mysql:host=localhost;dbname=dating;charset=utf8','root','root');
              //  FIXME: Try to connect once
              // Lecture de la table sport
              $requete="SELECT id_sport, design FROM sport ORDER BY design";
              $result=$connexion->query($requete);
              if ($result){
                while($row=$result->fetch()){
                  echo '<option value='.$row[0].'>'.$row[1].'</option>';
                }
              }
              ?>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
  </fieldset>
<?php 
var_dump($connexion)
?>
</form>
