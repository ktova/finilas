<?php

/*
 * Test API Pole Emploi
 */

// API Creds
$creds = parse_ini_file("../bin/api.ini", true);

// DB Creds

include('psx/gen_token.php');
include('psx/get_ref.php');

// Request data
$access_response = json_decode(generate_access_token($creds['id'], $creds['secret']));
//$referentiel = generate_referentiel($access_token);

print_r($access_response);
//print_r($referentiel);

?>

<form id="test" name="test_pe" method="get"> <!-- Choisir la méthode POST ou GET -->
  <div class="formdiv">
   <label for="valeur">Entrer la valeur</label>
   <input class="valeur" id="valeur" maxlength="32" name="valeur" required="required" type="text" placeholder="Entrez une valeur" />
   <input class="confirm" type="submit" name="confirm" id="Chercher" style="display: block;"/>
  </div>
</form>
<hr>