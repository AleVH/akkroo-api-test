<?php
/**
 * This class defines the structure of the Lead object. If there is any change in the data about a lead, should start here.
 */

namespace Src\Entities;

class Lead {

    private $lead_index;
    private $first_name;// (mandatory)
    private $last_name;//(mandatory)
    private $email;// (mandatory)
    private $accept_terms;// (mandatory)
    private $company;// (optional)
    private $post_code;// (optional)
    private $date_created;

    public function __construct($new_first_name, $new_last_name, $new_email, $new_accept_terms, $new_company = null, $new_post_code = null) {
        $this->lead_index = $this->sortOutIndex();
        $this->first_name = $new_first_name;
        $this->last_name = $new_last_name;
        $this->email = $new_email;
        $this->accept_terms = $new_accept_terms;
        $this->company = $new_company;
        $this->post_code = $new_post_code;
        $this->date_created = new \DateTime('now');
    }

    private function sortOutIndex(){
        if(apcu_exists('lead_index')){
            apcu_inc('lead_index');
        }else{
            apcu_add('lead_index', 0);
        }
        return apcu_fetch('lead_index');
    }

    public function getLeadIndex(){
        return $this->lead_index;
    }

    public function setLeadIndex($new_lead_index){
        $this->lead_index = $new_lead_index;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function setFirstName($new_first_name){
        $this->first_name = $new_first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function setLastName($new_last_name){
        $this->last_name = $new_last_name;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($new_email){
        $this->email = $new_email;
    }

    public function getAcceptTerms(){
        return $this->accept_terms;
    }

    public function setAcceptTerms($new_accept_terms){
        $this->accept_terms = $new_accept_terms;
    }

    public function getCompany(){
        return $this->company;
    }

    public function setCompany($new_company){
        $this->company = $new_company;
    }

    public function getPostCode(){
        return $this->post_code;
    }

    public function setPostCode($new_post_code){
        $this->post_code = $new_post_code;
    }

    public function getDateCreated(){
        return $this->date_created;
    }

    public function toArray(){
        $lead_array = array(
            'lead_index' => $this->lead_index,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'accept_terms' => $this->accept_terms,
            'company' => $this->company,
            'post_code' => $this->post_code,
            'date_created' =>$this->date_created
        );
        return $lead_array;
    }

}