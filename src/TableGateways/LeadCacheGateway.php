<?php

/**
 * in this particular case, the CacheConnector is an empty instantiated class, but could be another tye of cache system
 */

namespace Src\TableGateways;


use Src\Entities\Lead;
use Src\Interfaces\LeadGatewayInterface;
use Src\System\CacheConnector;

class LeadCacheGateway implements LeadGatewayInterface {

    private $cache;

    public function __construct(CacheConnector $new_cache){
        $this->cache = $new_cache;
    }

    public function findAll(){
        // TO-DO
        // this wil be different from the one in DB but has to return the same info
        $index = apcu_fetch('lead_index');
        $lead_array = array();
        for($i = 0; $i <= $index; $i++){
            $a_lead = apcu_fetch('lead_'.$i);
            array_push($lead_array, $a_lead);
        }
        return $lead_array;
    }

    public function find($id){
        return apcu_fetch('lead_'.$id);
    }

    public function save(Lead $new_lead){
        return apcu_store('lead_'.$new_lead->getLeadIndex(), $new_lead->toArray());
    }

    public function update(Lead $new_lead){

    }
}