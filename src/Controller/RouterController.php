<?php

namespace Src\Controller;

use Src\Traits\Responses;

class RouterController {

    use Responses;

    private $request_method; // POST, GET, DELETE, etc
    private $uri = array(); // tells the controller where to go
    private $authorization; // manages the token or the credentials to get one
    private $post_data; // if the call is to save data, this is the data

    public function __construct($new_request_method, array $new_uri, $new_authorization, $new_post_data = null){
        $this->request_method = $new_request_method;
        $this->uri = array_filter($new_uri);
        $this->authorization = $new_authorization;
        $this->post_data = $new_post_data;
    }

    /**
     * This method routes to the right end or throws an error
     * @param $segment
     * @return mixed
     */
    public function validate_uri_segments(){

        if($this->uri[0] === 'token'){
            $pre_response = new TokenController($this->request_method, $this->authorization['username'], $this->authorization['password']);
            $response = $pre_response->processRequest();
        }else{
            //t his if is to validate the access token
            if($this->validateAccessToken($this->authorization)){
                switch ($this->uri[0]){
                    case 'leads':
                        $pre_response = new LeadController($this->request_method, $this->post_data, $this->uri);
                        $response = $pre_response->processRequest();
                        break;
                    // TO-DO
                    // other cases
                    default:
                        $response = $this->notFoundResponse();
                        break;
                }
            }else{
                $response = $this->unauthorized('wrong token or expired');
            }
        }

        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    /**
     * This method checks token's expiration time.
     * @param $access_token
     * @return bool
     */
    private function validateAccessToken($access_token){
        return TokenController::tokenValidator($access_token);
    }
}