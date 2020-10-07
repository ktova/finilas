<?php

/*
 * Test API Pole Emploi
 */

// API Creds
$creds = parse_ini_file("../bin/api.ini", true);

include('psx/gen_token.php');

// Request data
$access_response = json_decode(generate_access_token($creds['id'], $creds['secret']));

print_r($access_response);
echo '--- <br>';

// DEBUG

try {
  $client->request('GET', 'https://api.emploi-store.fr/partenaire/offresdemploi/v2/offres/search?qualification=0', [
    'headers' => [
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Authorization' => ['Bearer',''.$access_response->access_token.''],
        'scope' => ['application_'.$access_response->scope.'', 'api_offresdemploiv2']
    ]
  ]);
} catch (RequestException $e) {
  echo Psr7\str($e->getRequest());
  echo Psr7\str($e->getResponse());
}

?>

<form id="test" name="test_pe" method="get"> <!-- Choisir la méthode POST ou GET -->
  <div class="formdiv">
   <label for="valeur">Entrer la valeur</label>
   <input class="valeur" id="valeur" maxlength="32" name="valeur" required="required" type="text" placeholder="Entrez une valeur" />
   <input class="confirm" type="submit" name="confirm" id="Chercher" style="display: block;"/>
  </div>
</form>
<hr>