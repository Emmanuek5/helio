<?php
session_start();


$pakage = $_GET['pakage'];

// create a function to download the package from the server to a local folder

function download($pakage) {
    $url = "https://accessapi.cf/pakage/".$pakage.".zip";
    $file = fopen($url, 'r');
    $content = stream_get_contents($file);
    fclose($file);
    $file = fopen($pakage.".zip", 'w');
    fwrite($file, $content,"./paked");
    fclose($file);
}

download($pakage);