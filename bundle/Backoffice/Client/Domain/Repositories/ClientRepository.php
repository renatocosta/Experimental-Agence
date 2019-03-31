<?php

namespace Backoffice\Client\Domain\Repositories;

use Backoffice\Client\Domain\Entity\Client;
use Backoffice\Client\Infrastructure\Persistence\Orm\Eloquent\ClientModel;
use Backoffice\Client\Domain\ValueObject\ClientId;

interface ClientRepository
{
    /**
     * @return ClientId
     */
    public function nextIdentity();
    /**
     * @param Client $client
     */
    public function add(Client $client);
    /**
     * @param Client $client
     */
    public function save(Client $client);

    /**
     * @return array
     */
    public function getAll();    
    
    /**
     * @param int $clientId
     * @return Client
     */
    public function ofId(int $clientId): ClientModel;
    
}