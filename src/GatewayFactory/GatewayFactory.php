<?php

namespace Src\GatewayFactory;

use Src\System\DatabaseConnector;
use Src\System\CacheConnector;

class GatewayFactory {

    public static function createGateway($entity){
        switch (getenv('AKKROON_STORAGE_PREFERENCE')){
            case 'cache':
                $gateway_name = "Src\TableGateways\\".$entity.'CacheGateway';
                return new $gateway_name(new CacheConnector());
            case 'db':
                $gateway_name = "Src\TableGateways\\".$entity.'DBGateway';
                return new $gateway_name((new DatabaseConnector())->getConnection());
            default:
                throw new \Exception('Must provide a data storage method.');
        }
    }

}