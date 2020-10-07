<?php

    // Get Ressources from API
    function generate_referentiel($access_token){

        $ch = curl_init();
        $headers = array('Content-Type: application/json');
        $fields = [
            'Authorization' => 'Bearer '.$access_token.''
        ];
        $body = http_build_query($fields);
    
        curl_setopt($ch, CURLOPT_URL, 'https://api.emploi-store.fr/partenaire/offresdemploi/v2/referentiel/pays');
        //curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
    
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
        // Return response
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $ref = curl_exec($ch);
        curl_close($ch);
        $ref_list = json_decode($ref);
        return $ref_list;
    
    }