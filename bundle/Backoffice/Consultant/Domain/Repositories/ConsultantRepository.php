<?php

namespace Backoffice\Consultant\Domain\Repositories;

use Backoffice\Consultant\Domain\Entity\Consultant;
use Backoffice\Consultant\Infrastructure\Persistence\Orm\Eloquent\ConsultantModel;
use Backoffice\Consultant\Domain\ValueObject\ConsultantId;

interface ConsultantRepository
{
    /**
     * @return ConsultantId
     */
    public function nextIdentity();
    /**
     * @param Consultant $consultant
     */
    public function add(Consultant $consultant);
    /**
     * @param Consultant $consultant
     */
    public function save(Consultant $consultant);

    /**
     * @return array
     */
    public function getAll();    
    
    /**
     * @param int $consultanId
     * @return Consultant
     */
    public function ofId(int $consultantId): ConsultantModel;
    
}