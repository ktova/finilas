<?php

    // Get Ressources from API
    function global_search_query($access_token){

        $ch = curl_init();
        $headers = array(
            'Content-Type: application/json',
            'Accept: application/json',
            //'Authorization: Bearer '.$access_token.''
        );

        // url modelization
        $url = 'https://api.emploi-store.fr/partenaire/offresdemploi/v2/offres/search?qualification=0&motsCles=informatique';
    
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_HEADER, 0);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    
        // Return response
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $search_results = curl_exec($ch);
        print_r($ch);
        echo '--- <br>';
        curl_close($ch);
        return $search_results;
    
    }