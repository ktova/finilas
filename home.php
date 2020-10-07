<?php

/*
 * Test API Pole Emploi
 */

// Require composer's autoloader
require '../vendor/autoload.php';
use GuzzleHttp\Client;

// Setup Guzzle client
$client = new Client([
  // Base URI is used with relative requests
  'base_uri' => 'https://api.emploi-store.fr/partenaire/offresdemploi/v2/',
]);

// API Creds
$creds = parse_ini_file("../bin/api.ini", true);

// DB Creds

include('psx/gen_token.php');
include('psx/search.php');

// Request data
$access_response = json_decode(generate_access_token($creds['id'], $creds['secret']));
$search_result = json_decode(global_search_query($access_response->access_token, $access_response->scope));

print_r($access_response);
echo '--- <br>';
print_r($access_response->access_token);
echo '--- <br>';
print_r($search_result);

?>

<form id="test" name="test_pe" method="get"> <!-- Choisir la méthode POST ou GET -->
  <div class="formdiv">
   <label for="valeur">Entrer la valeur</label>
   <input class="valeur" id="valeur" maxlength="32" name="valeur" required="required" type="text" placeholder="Entrez une valeur" />
   <input class="confirm" type="submit" name="confirm" id="Chercher" style="display: block;"/>
  </div>
</form>
<hr>