<?php
header( "Content-Type: application/json" );
header( "Access-Control-Allow-Origin:*" );
date_default_timezone_set('Europe/Paris');

if (!isset($_GET["token"])) {
    return;
}

$token = $_GET["token"];

$file_name = "results.json";
$json = file_get_contents($file_name);
$json_d = json_decode($json, true);
$append = "";

foreach ($json_d as $value) {
    $token_s = $value['token'];
    $file_s = $value['file'];

    if($token === $token_s){
        $append = $file_s;
        break;
    }else{
        $append = "0";
    }
}

echo $append;<?php
