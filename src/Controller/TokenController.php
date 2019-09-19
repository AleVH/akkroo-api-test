<?php
/**
 * This class is in charge of everything related to tokens, verification, creation, set expiration, etc
 */

namespace Src\Controller;


use Src\Traits\Responses;

class TokenController {

    use Responses;

    private $request_method;
    private $username;
    private $password;

    public function __construct($new_request_method, $new_username, $new_password){
        $this->request_method = $new_request_method;
        $this->username = $new_username;
        $this->password = $new_password;
    }

    /**
     * This method is to check the request method is valid
     * @return mixed
     */
    public function processRequest(){
        if($this->request_method == 'POST'){
            return $this->validateUser($this->username, $this->password);
        }
        return $this->requestMethodNotAllowedResponse();
    }

    /**
     * This method is for when the user makes the call to get an access token, to validate credentials in order to get one.
     * @param $user
     * @param $password
     * @return mixed
     */
    public function validateUser($user, $password){
        if(apcu_exists('user_'.$user)){
            if(apcu_fetch('user_'.$user) === $password){
                return $this->getNewToken();
            }
        }
        return $this->badRequest();
    }

    /**
     * This method generates the token.
     * @return string
     * @throws \Exception
     */
    private function tokenGenerator(){
        return bin2hex(\random_bytes(64));
    }

    /**
     * This method is to set the expiration time in the token
     * @return \DateTime
     * @throws \Exception
     */
    private function tokenTimer(){
        return (new \DateTime('now'))->add(new \DateInterval('PT30M'))->format('d-m-Y H:i:s');
    }

    /**
     * This method (static so can be used from the router controller without much problem) is to check if the token has expired or not
     * @param $token_to_validate
     * @return bool
     * @throws \Exception
     */
    static public function tokenValidator($token_to_validate){
        if(apcu_exists('token_'.$token_to_validate)){
            $token_expiration_time = apcu_fetch('timer_'.$token_to_validate);
            $nows_time = new \DateTime('now');
            $token_timer = new \DateTime($token_expiration_time);
            if($nows_time < $token_timer){
                return true;
            }
        }
        return false;
    }

    /**
     * This is the method that binds together the whole token generation process.
     * @return mixed
     * @throws \Exception
     */
    private function getNewToken(){
        $token = $this->tokenGenerator();
        $expiration = $this->tokenTimer();
        apcu_add('token_'.$token, $this->username);
        apcu_add('timer_'.$token, $expiration);
        $access_token = array(
            'access_token' => $token,
            'expires_in' => $expiration,
            'token_type' => 'Bearer',
            'scope' => 'Akkroo Realm'
        );
        $response['status_code_header'] = 'HTTP/1.1 201 Created';
        $response['body'] = json_encode($access_token);
        return $response;
    }

}