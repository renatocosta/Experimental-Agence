<?php

namespace Backoffice\Client\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Client\Domain\Repositories\ClientRepository;
use Backoffice\Client\Domain\ValueObject\ClientId;
use Backoffice\Client\Domain\Entity\Client;
use Backoffice\Client\Infrastructure\Persistence\Orm\Eloquent\ClientModel;

class EloquentClientRepository implements ClientRepository {

    /**
     *
     * @var ClientModel 
     */
    private $model;

    public function __construct(ClientModel $model) {
        $this->model = $model;
    }

    public function add(Client $Client) {
        
    }

    public function getAll() {
        
        return $this->model
                        ->select(['co_cliente', 'no_razao'])
                        ->where('tp_cliente', 'A')
                        ->get();
    }

    public function nextIdentity(): ClientId {
        
    }

    public function ofId(int $clientId): ClientModel {
        
    }

    public function save(Client $client) {
        
    }

}
