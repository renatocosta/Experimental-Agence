<?php

namespace Backoffice\Consultant\Domain\Repositories;

interface ConsultantByPerformanceRepository
{
  
    /**
     * @param array $filter
     * @return model
     */
    public function getByCriteria($filter = []);    
    
    
}