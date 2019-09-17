<?php


namespace Src\TableGateways;


use Src\Entities\Lead;
use Src\Interfaces\LeadGatewayInterface;
use Src\System\DatabaseConnector;

class LeadDBGateway implements LeadGatewayInterface {

    private $db;

    public function __construct(DatabaseConnector $new_db){
        $this->db = $new_db;
    }

    public function findAll(){
        // TO-DO
        // this will be different from the one from cache but has to return the same info, the following one is an example IT DOES NOT WORK
        $statement = "
            SELECT 
                id, prisoner_name, cell, block
            FROM
                prisoner;
        ";

        try {
            $statement = $this->useDatabase()->query($statement);
            $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function find($id){
        //TO-DO
    }

    public function save(Lead $new_lead){
        //TO-DO
    }

    public function update(Lead $new_lead){
        //TO-DO
    }

}