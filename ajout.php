<?php 
include_once('./shared/header.php')
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
</form>