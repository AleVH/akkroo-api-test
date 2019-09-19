<?php

require "../bootstrap.php";

$clientId     = getenv('AKKROO_CLIENTID');
$clientSecret = getenv('AKKROO_SECRET');
$scope        = getenv('AKKROO_SCOPE');
$base_url     = getenv('AKKROO_BASE_URL');
$port         = getenv('AKKROO_PORT');

// STEP 1 - Execute the client file ("php client.php") only with the next line uncommented and all other steps commented
//plantSeeds($base_url, $port);

// STEP 2 - Once the 'seeds' had been planted, uncomment the next line together with any of the other steps. Keep in mind that the step 4 will not work until you execute the step 3.2 first
//$token = checkToken($base_url, $clientId, $clientSecret, $port, $scope);

// STEP 3.1 - This and the next 2 steps are examples of things that can be done with the api, fetch all data, specific data and save data
//getAllLeads($base_url, $port, $token);

// STEP 3.2
//saveLead($base_url, $port, $token);

// STEP 4
//getLead($base_url, $port, $token, 100);


function plantSeeds($base_url, $port){
    echo "planting data seeds...";

    $url = $base_url.'/seeds';

    $ch = curl_init();

    if($ch === false)
    {
        die('Failed to create curl object');
    }

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_PORT , $port);

    $output = curl_exec($ch);
//    $output = json_decode($output, true);
    curl_close ($ch);

    var_dump($output);
}

function getToken($base_url, $clientId, $clientSecret, $port, $scope){
    echo "get token\n";

    // prepare the request
    $url = $base_url.'/token';

    $token = base64_encode("$clientId:$clientSecret");
    $payload = http_build_query(array(
        'grant_type' => 'client_credentials',
        'scope'      => $scope
    ));

    $http_header = array(
        'Content-Type: application/x-www-form-urlencoded',
        "Authorization: Basic $token"
    );

    // build the curl request
    $ch = curl_init();

    if($ch === false)
    {
        die('Failed to create curl object');
    }

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_HTTPHEADER, $http_header);
    curl_setopt ($ch, CURLOPT_POST, 1);

    // The submitted form data, encoded as query-string-style name-value pairs
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_PORT , $port);

    $output = curl_exec($ch);

    if (curl_errno($ch)) {
        print curl_error($ch);
    }
    curl_close ($ch);

    $clean_output = json_decode($output, true);

    var_dump($clean_output);

    if(!isset($clean_output['access_token']) || !isset($clean_output['token_type'])){
        exit('Failed obtaining token. Exiting');
    }
    $file = 'client_token.txt';
    file_put_contents($file, $clean_output['token_type']." ".$clean_output['access_token']);
    return $clean_output['token_type']." ".$clean_output['access_token'];

}

function checkToken($base_url, $clientId, $clientSecret, $port, $scope){
    if(file_exists('client_token.txt')){echo "getting token from file\n";
        return file_get_contents('client_token.txt');
    }else{echo "getting token from api\n";
        return getToken($base_url, $clientId, $clientSecret, $port, $scope);
    }
}

function saveLead($base_url, $port, $token){
    echo "saving Lead...";

//    echo 'token: '.$token."\n";

    $url = $base_url.'/leads';

    $sample_data = array(
        'first_name' => 'Ale',
        'last_name' => 'VH',
        'email' => 'alevh@gmail.com',
        'accept_terms' => true,
        'company' => 'Emporio VH',
        'post_code' => 'SE19 2AJ'
    );

    $ch = curl_init();

    if($ch === false)
    {
        die('Failed to create curl object');
    }

    $post_data = json_encode($sample_data);

    curl_setopt ($ch, CURLOPT_URL, $url);
//    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_PORT , $port);
    curl_setopt ($ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        "Authorization: $token"
    ));
//    curl_setopt ($ch, CURLOPT_VERBOSE, 1);

    $output = curl_exec($ch);
//    $output = json_decode($output, true);
    curl_close ($ch);

    var_dump($output);

}

function getAllLeads($base_url, $port, $token){
    echo "getting Leads...";

    $url = $base_url.'/leads';

    $ch = curl_init();

    if($ch === false)
    {
        die('Failed to create curl object');
    }

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_PORT , $port);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        "Authorization: $token"
    ));
//    curl_setopt ($ch, CURLOPT_VERBOSE, 1);

    $output = curl_exec($ch);
    $output = json_decode($output, true);
    curl_close ($ch);

    var_dump($output);

}

function getLead($base_url, $port, $token, $id){
    echo "getting a Lead...";

    $url = $base_url.'/leads/'.$id;

    $ch = curl_init();

    if($ch === false)
    {
        die('Failed to create curl object');
    }

    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt ($ch, CURLOPT_PORT , $port);
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        "Authorization: $token"
    ));
//    curl_setopt ($ch, CURLOPT_VERBOSE, 1);

    $output = curl_exec($ch);
//    $output = json_decode($output, true);
    curl_close ($ch);

    var_dump($output);
}