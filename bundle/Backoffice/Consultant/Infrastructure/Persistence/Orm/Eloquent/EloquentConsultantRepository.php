<?php

namespace Backoffice\Consultant\Infrastructure\Persistence\Orm\Eloquent;

use Backoffice\Consultant\Domain\Repositories\ConsultantRepository;
use Backoffice\Consultant\Domain\ValueObject\ConsultantId;
use Backoffice\Consultant\Domain\Entity\Consultant;
use Backoffice\Consultant\Infrastructure\Persistence\Orm\Eloquent\ConsultantModel;
use Backoffice\UserPermissions\Domain\ValueObject\UserTypes;

class EloquentConsultantRepository implements ConsultantRepository {

    /**
     *
     * @var ConsultantModel 
     */
    private $model;

    public function __construct(ConsultantModel $model) {
        $this->model = $model;
    }

    public function add(Consultant $consultant) {
        
    }

    public function getAll() {
        
        return $this->model
                        ->select(['co_usuario', 'no_usuario'])
                        ->has('PermissionsSystem')
                        ->whereHas('PermissionsSystem', function ($query) {
                            $query->where('in_ativo', 'S');
                            $query->where('co_sistema', 1);
                            $query->whereIn('co_tipo_usuario', UserTypes::TYPES);
                        })
                        ->get();
    }

    public function nextIdentity(): ConsultantId {
        
    }

    public function ofId(int $consultantId): ConsultantModel {
        
    }

    public function save(Consultant $consultant) {
        
    }

}
