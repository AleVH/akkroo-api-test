<?php

require "../bootstrap.php";

use Src\Controller\RouterController;
use Src\Controller\DataSeedController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

$valid_endpoints = array('token', 'leads', 'seeds');
if(!in_array($uri[2], $valid_endpoints)){
    header("HTTP/1.1 404 Not Found");
    exit("Akkroo - not a valid endpoint");
}

// this is necessary for every single request.
$requestMethod = $_SERVER["REQUEST_METHOD"];
$data = '';

// this bit is just to have some example data in the api to test
if($uri[2] == 'seeds'){
    DataSeedController::clearAllCache();
    DataSeedController::plantDataSeeds();
}

if($uri[2] === 'token'){
    $authorization = array(
        'username' => $_SERVER['PHP_AUTH_USER'],
        'password' => $_SERVER['PHP_AUTH_PW']
    );
}else {
    // this bit is to get the access token from the request
    switch (true) {
        case array_key_exists('HTTP_AUTHORIZATION', $_SERVER) :
            $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
            break;
        case array_key_exists('Authorization', $_SERVER) :
            $authHeader = $_SERVER['Authorization'];
            break;
        default :
            $authHeader = null;
            break;
    }

    preg_match('/Bearer\s(\S+)/', $authHeader, $matches);

    if (!isset($matches[1])) {
        throw new \Exception('No Bearer Token');
    } else {
        $authorization = $matches[1];
    }

    if ($requestMethod === 'POST' || $requestMethod === 'UPDATE') {
        $data = json_decode(file_get_contents('php://input'), true);
    }
}

$router_controller = new RouterController($requestMethod, $uri, $authorization, $data);
$router_controller->validate_uri_segments();
