<?php

namespace Src\Interfaces;

use Src\Entities\Lead;

interface LeadGatewayInterface {

    public function findAll();

    public function find($id);

    public function save(Lead $new_lead);

    public function update(Lead $new_lead);

}