<?php

$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public/index.php');
echo $public_end; 
// $doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
$doc_root = 'project-management-system';
define("ROOT", $doc_root);


function checkUri($url) {
    if ($url != strtolower($url)) {
    http_response_code(301);
    header('location: ' . strtolower($url));
    }
}

$url = strtok(ltrim($_SERVER['REQUEST_URI'], '/'), '?');



?>