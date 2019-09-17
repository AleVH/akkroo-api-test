<?php

namespace Src\Traits;

use Src\System\DatabaseConnector;

trait dbConnection {
    function useDatabase(){
        return (new DatabaseConnector())->getConnection();
    }
}