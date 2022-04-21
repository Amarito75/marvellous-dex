<?php

//Create apiKey in URL
$publicKey = '142c6144bc228dc2eec86f05a198b5b6';
$privateKey = '4770a98bc9b04f620912d4e9ccfc1ab7966b2ad9';
$timeStamp = time();
$hash = md5($timeStamp.$privateKey.$publicKey);
$params = '?ts='.$timeStamp.'&apikey='.$publicKey.'&hash='.$hash.'';

function apiCall($url)
{

    //Cache
    $raw = md5($url);
    $filePath = './cache/'.$raw;
    $cacheUsed = false;

    if(file_exists($filePath))
    {
        $jsonResult = file_get_contents($filePath);
        $cacheUsed = true;
    }
    
    else
    {
        //Curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $jsonResult = curl_exec($curl);
        curl_close($curl);
        file_put_contents($filePath, $jsonResult);
    }
    
    //Request time limit
    set_time_limit(0);
    //Decode JSON
    $jsonResult = json_decode($jsonResult);
    return $jsonResult;
}
    