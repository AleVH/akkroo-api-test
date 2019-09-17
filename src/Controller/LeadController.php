<?php


namespace Src\Controller;

use Src\Entities\Lead;
use Src\GatewayFactory\GatewayFactory;
use Src\Traits\Responses;
use Src\TableGateways\LeadCacheGateway;
use Src\TableGateways\LeadDBGateway;

class LeadController {

    use Responses;

    private $request_method;// specifies the request method
    private $request_data; // in the case of post data, this is for that, but could be null in a get request
    private $uri;// in case of doing something on a specific record
    private $storage_pref;// this is to define the storage preference database, cache or something else

    public function __construct($new_request_method, $new_request_data, $uri = null){
        $this->request_data = $new_request_data;
        $this->request_method = $new_request_method;
        $this->uri = $uri;
        $this->storage_pref = GatewayFactory::createGateway('Lead');
    }

    public function processRequest(){
        switch ($this->request_method){
            case 'GET': // only to get data
                return $this->getLead();
                break;
            case 'POST':
                return $this->saveLead();
                break;
            case 'UPDATE':
                break;
            case 'DELETE':
                break;
        }
    }

    /**
     * This method is to get all leads or a specific one. in this particular case, if there is some problem with the lead id, it's going to return all leads by default
     */
    private function getLead(){
        if(isset($this->uri[3]) && is_numeric($this->uri[3])){
            $lead_data = $this->storage_pref->find($this->uri[3]);
        }else{
            $lead_data = $this->storage_pref->findAll();
        }
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($lead_data);
        return $response;
    }

    private function saveLead(){
        if($this->request_data['accept_terms']){
            $new_lead = new Lead($this->request_data['first_name'], $this->request_data['last_name'], $this->request_data['email'], $this->request_data['accept_terms'], $this->request_data['company'], $this->request_data['post_code']);
            $this->storage_pref->save($new_lead);
            $new_lead_index = array('lead_id' => $new_lead->getLeadIndex());
            $response['status_code_header'] = 'HTTP/1.1 201 Created';
            $response['body'] = json_encode($new_lead_index);
        }else{
            $response = $this->unauthorized('Must accept terms');
        }
        return $response;
    }
}