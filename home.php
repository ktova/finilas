<?php

/*
 * Test API Pole Emploi
 */

// API Creds
$creds = parse_ini_file("../bin/api.ini", true);

// DB Creds

// Generate access token
function generate_access_token($id, $secret){

    $ch = curl_init();
    $headers = array('Content-Type: application/x-www-form-urlencoded');
    $body = '{"grant_tye": "client_credentials", "client_id": "'.$id.'", "client_secret": "'.$secret.'", "scope": "application_'.$id.'%20api_finilas"}';
    
    curl_setopt($ch, CURLOPT_URL, 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token');
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Return response
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $authToken = curl_exec($ch);
    return $authToken;

}

// Request data
$otoken = generate_access_token($creds['id'], $creds['secret']);

?>

<form id="test" name="test_pe" method="get"> <!-- Choisir la méthode POST ou GET -->
  <div class="formdiv">
   <label for="valeur">Entrer la valeur</label>
   <input class="valeur" id="valeur" maxlength="32" name="valeur" required="required" type="text" placeholder="Entrez une valeur" />
   <input class="confirm" type="submit" name="confirm" id="Chercher" style="display: block;"/>
  </div>
</form>
<hr>

<?= $otoken ?>