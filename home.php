<?php

/*
 * Test API Pole Emploi
 */

$creds = parse_ini_file("../bin/api.ini", true);

function generate_access_token(){

}

?>

<form id="test" name="test_pe" method="get"> <!-- Choisir la méthode POST ou GET -->
  <div class="formdiv">
   <label for="valeur">Entrer la valeur</label>
   <input class="valeur" id="valeur" maxlength="32" name="valeur" required="required" type="text" placeholder="Entrez une valeur" />
   <input class="confirm" type="submit" name="confirm" id="Chercher" style="display: block;"/>
  </div>
</form>