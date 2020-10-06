<?php

// Generate access token
function generate_access_token($id, $secret){

    $ch = curl_init();
    $headers = array('Content-Type: application/x-www-form-urlencoded');
    //$body = '{"grant_type": "client_credentials", "client_id": "'.$id.'", "client_secret": "'.$secret.'", "scope": "application_'.$id.'%20api_finilas"}';
    $fields = [
        'grant_type' => 'client_credentials',
        'client_id' => $id,
        'client_secret' => $secret,
        'scope' => 'application_'.$id.''
    ];
    $body = http_build_query($fields);

    curl_setopt($ch, CURLOPT_URL, 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=%2Fpartenaire');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, 0);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

    // Return response
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $authToken = curl_exec($ch);
    curl_close($ch);
    return $authToken;

}