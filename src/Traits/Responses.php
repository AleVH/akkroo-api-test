<?php

namespace Src\Traits;

trait Responses {
    function requestMethodNotAllowedResponse(){
        $response['status_code_header'] = 'HTTP/1.1 405 Method Not Allowed';
        $response['body'] = null;
        return $response;
    }

    function notFoundResponse(){
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }

    function badRequest($bad_request_msg = null){
        $response['status_code_header'] = 'HTTP/1.1 400 Bad Request';
        $response['body'] = $bad_request_msg;
        return $response;
    }

    function unauthorized($unauthorized_msg = null){
        $response['status_code_header'] = 'HTTP/1.1 401 Unauthorized';
        $response['body'] = $unauthorized_msg;
        return $response;
    }

}