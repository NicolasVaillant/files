<?php
//header( "Content-Type: application/json" );
header( "Access-Control-Allow-Origin:*" );
date_default_timezone_set('Europe/Paris');

if (!isset($_GET["token"])) {
    return;
}

$token = $_GET["token"];

$file_name = 'results.json';
$tmp_file_name = 'results.tmp';

while (file_exists($tmp_file_name)) {
}

$tmp_file = fopen($tmp_file_name, 'w') or die("Can't create file");

if (file_exists($file_name)) {
    $json = file_get_contents($file_name);
    $array = json_decode($json, true);

    $tempArray = array(
        "token" => $token,
        "date" => date("d M y (H:i)")
    );
    $array[] = $tempArray;
}else {
    $array = array(
        $tempArray = array(
            "token" => $token,
            "date" => date("d M y (H:i)")
        )
    );
}

$json = json_encode($array);
file_put_contents($tmp_file_name, $json);
// Swap tmp file with origin file
fclose($tmp_file);
unlink($file_name);
rename($tmp_file_name, $file_name);

echo "status:ok/"."Home:".$point."/Out:".$weather;
