<?php

require "bootstrap.php";

//spl_autoload_register(function ($class) {
//    include '\src\\' . $class . 'php';
//});

use PHPUnit\Framework\TestCase;

final class AkkrooApiTest extends TestCase
{
    private $http;

    public function setUp(){
        $uri = getenv('AKKROO_BASE_URL')."/public";
        $this->http = new GuzzleHttp\Client(['base_uri' => $uri]);
    }

    public function tearDown() {
        $this->http = null;
    }

    public function testSeeds() {
        $response = $this->http->request('GET', 'seeds');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=UTF-8", $contentType);

        $seeds = $response->getBody();
        $this->assertRegexp('/Seeds Planted/', $seeds);
    }

    public function testTokenNotAllowedMethod(){
        $response = $this->http->request('GET', 'token', ['http_errors' => false]);
        $this->assertEquals(405, $response->getStatusCode());
    }

    public function testTokenRequest(){
        $response = $this->http->request('POST', 'token', ['auth' => ['Akkroo', 'giveMeTheJob!']]);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertRegExp('/access_token/', $response->getBody());
        $json_string_start = strpos($response->getBody(), "{");
        $json_string_end = strpos($response->getBody(), "}");
        $json_string = substr($response->getBody(), $json_string_start, ($json_string_end+1));
        $json_decoded = json_decode($json_string, true);
        return $json_decoded['access_token'];
    }

    /**
     * @depends testTokenRequest
     */
    public function testGetLead($token){
        $response = $this->http->request('GET', 'leads/50', ['headers' => ['Authorization' => 'Bearer '.$token, 'Accept' => 'application/json']]);
        $this->assertEquals(200, $response->getStatusCode());
        // in this case the array structure could be checked to be sure it's correct...
        $rx = json_decode($response->getBody(), true);
//        var_dump($rx);
    }

    /**
     * @depends testTokenRequest
     */
    public function testPostLead($token){
        $response = $this->http->request('POST', 'leads', ['headers' => ['Authorization' => 'Bearer '.$token, 'Accept' => 'application/json', 'Content-Type' => 'application/json'], 'json' => [
            'first_name' => 'Ale',
            'last_name' => 'VH',
            'email' => 'alevh@gmail.com',
            'accept_terms' => true,
            'company' => 'Emporio VH',
            'post_code' => 'SE19 2AJ'
        ]]);
        $this->assertEquals(201, $response->getStatusCode());
        $this->arrayHasKey('lead_id', json_decode($response->getBody(), true));
        var_dump(json_decode($response->getBody(), true));
    }

    /**
     * If you can see the Lead saved in the previous step, then is all ok
     * @depends testTokenRequest
     */
    public function testGetAll($token){
        $response = $this->http->request('GET', 'leads', ['headers' => ['Authorization' => 'Bearer '.$token, 'Accept' => 'application/json']]);
        $this->assertEquals(200, $response->getStatusCode());
        $rx = json_decode($response->getBody(), true);
        var_dump($rx);
    }

}