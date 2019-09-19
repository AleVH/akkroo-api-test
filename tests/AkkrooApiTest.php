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
        $uri = getenv('AKKROO_BASE_URL');
        $this->http = new GuzzleHttp\Client(['base_uri' => $uri]);
    }

    public function tearDown() {
        $this->http = null;
    }

    public function testSeeds() {
        $response = $this->http->request('GET', 'public/seeds');

        $this->assertEquals(200, $response->getStatusCode());

        $contentType = $response->getHeaders()["Content-Type"][0];
        $this->assertEquals("application/json; charset=UTF-8", $contentType);

        $seeds = $response->getBody();
        $this->assertRegexp('/Seeds Planted/', $seeds);
    }

    public function testTokenNotAllowedMethod(){
        $response = $this->http->request('GET', 'public/token', ['http_errors' => false]);
        $this->assertEquals(405, $response->getStatusCode());
    }

    public function testTokenRequest(){
        $response = $this->http->request('POST', 'public/token', ['auth' => ['Akkroo', 'giveMeTheJob!']]);
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertRegExp('/access_token/', $response->getBody());
        $json_string_start = strpos($response->getBody(), "{");
        $json_string_end = strpos($response->getBody(), "}");
        $json_tring = substr($response->getBody(), $json_string_start, $json_string_end);
        $json_decoded = json_decode($json_tring, true);
        return $json_decoded['access_token'];
    }

    /**
     * @depends testTokenRequest
     */
    public function testGetAll($token){
//        $response = $this->http->request('GET', 'public/leads', ['auth', ['Bearer '.$token]]);

    }
}